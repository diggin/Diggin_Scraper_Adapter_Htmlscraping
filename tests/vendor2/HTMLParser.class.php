<?php

/**
 * ---------------------------------------------------------------------
 * HTMLParser class
 * ---------------------------------------------------------------------
 * PHP versions 4 and 5
 * ---------------------------------------------------------------------
 * LICENSE: This source file is subject to the GNU Lesser General Public
 * License as published by the Free Software Foundation;
 * either version 2.1 of the License, or any later version
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/lgpl.html
 * If you did not have a copy of the GNU Lesser General Public License
 * and are unable to obtain it through the web, please write to
 * the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 * ---------------------------------------------------------------------
 */

require_once('XML/HTMLSax3.php');

/**
 * HTMLParser class
 *
 * A SAX based parser using PEAR XML_HTMLSax3 class
 * helps you to have a XML compliant document
 * from malformed markups such as HTML.
 *
 * @version    1.2.1 (stable) issued May 17, 2007
 * @author     ucb.rcdtokyo http://www.rcdtokyo.com/ucb/
 * @license    GNU LGPL v2.1+ http://www.gnu.org/licenses/lgpl.html
 * @see        http://pear.php.net/package/XML_HTMLSax3
 *
 * Basic usage:
 * <code>
 * $source = '<HTML><FOO><P ALIGN=CENTER FOO=BAR>FOO&BAR<BAR>;
 * $parser = new HTMLParser;
 * $parser->setRoot('html');
 * $parser->setGenericParent('body');
 * $parser->setRule(array(
 *   'html' => array(
 *     'children' => array('body'),
 *     'attributes' => array('xmlns', 'xml:lang'),
 *     'default_child' => 'body'),
 *   'body' => array(
 *     'children' => array('p'),
 *     'attributes' => array('id', 'class', 'style' 'xml:lang'),
 *   'p' => array(
 *     'children' => array('#PCDATA'),
 *     'attributes' => array('id', 'class', 'style' 'xml:lang', 'align'),
 * ));
 * $parser->parse($source);
 * $result = $parser->dump();
 * // $result is:
 * // <html><body><p align="CENTER">FOO&amp;BAR</p></body></html>
 * </code>
 */
class HTMLParser
{
    /**
     * @var array
     * @access protected
     */
    var $dtd = array();

    /**
     * @var array
     * @access protected
     */
    var $construct = array();

    /**
     * @var string
     * @access protected
     */
    var $current_construct = '';

    /**
     * @var array
     * @access protected
     */
    var $node = array();

    /**
     * @var array
     * @access protected
     */
    var $current_node = array();

    /**
     * @var array
     * @access protected
     */
    var $root = array();

    /**
     * @var array
     * @access protected
     */
    var $tags_to_save = array();

    /**
     * @var array
     * @access protected
     */
    var $saved_tags = array();

    /**
     * @var string
     * @access protected
     */
    var $generic_parent;

    /**
     * Attributes minimized in HTML.
     *
     * @var array
     * @access protected
     */
    var $html_minimized_attributes = array(
        'checked', 'compact', 'controls', 'declare', 'defer', 'disabled',
        'ismap', 'mayscript', 'multiple', 'nohref', 'noshade', 'nowrap',
        'readonly', 'selected', 'utn', 'wrap'
    );

    /**
     * @access public
     */
    function HTMLParser()
    {
        $this->__construct();
    }

    /**
     * @access public
     */
    function __construct()
    {
    }

    /**
     * @param  string  $data
     * @access public
     */
    function parse($data)
    {
        $parser = new XML_HTMLSax3;
        $parser->set_object($this);
        $parser->set_element_handler('openHandler', 'closeHandler');
        $parser->set_data_handler('dataHandler');
        $parser->set_escape_handler('escapeHandler');
        $parser->set_option('XML_OPTION_TRIM_DATA_NODES', 0);
        $parser->parse($data);
    }

    /**
     * Handling open tags.
     *
     * @param  object  $parser
     * @param  string  $name
     * @param  array   $attribs
     * @return void
     * @access public
     */
    function openHandler(&$parser, $name, $attribs)
    {
        $name = strtolower($name);
        // Do nothing if the element name is not defined.
        if (isset($this->dtd[$name])) {
            if (isset($this->dtd[$name]['replace'])) {
                $name = $this->dtd[$name]['replace'];
            }
            if ($this->_checkAttributes($name, $attribs)) {
                if (in_array($name, $this->tags_to_save)) {
                    $this->_saveTag($name, $attribs);
                }
                if (!empty($this->current_node)) {
                    if (!isset($this->node[$name])) {
                        $this->_elementLookup($name, $attribs);
                    } elseif (isset($this->dtd[$name]['type'])
                        and $this->dtd[$name]['type'] == 'unique'
                        and !empty($attribs)
                        and false !== strpos($this->current_construct, "<$name>")) {
                        $this->current_construct = str_replace(
                            "<$name>",
                            $this->_formatOpenTag($name, $attribs),
                            $this->current_construct
                        );
                    }
                } elseif ($name != $this->root[0]) {
                    $this->_appendNode(
                        $this->root[0],
                        (isset($this->root[1])? $this->root[1]: array())
                    );
                    $this->_elementLookup($name, $attribs);
                } else {
                    $this->_appendNode($name, $attribs);
                }
            }
        }
    }

    /**
     * Handling close tags.
     *
     * @param  object  $parser
     * @param  string  $name
     * @return void
     * @access public
     */
    function closeHandler(&$parser, $name)
    {
        $name = strtolower(trim($name));
        // Do nothing if the element name is not defined
        // or the array representing the current node tree is empty.
        if (isset($this->dtd[$name]) and !empty($this->current_node)) {
            if (isset($this->dtd[$name]['replace'])) {
                $name = $this->dtd[$name]['replace'];
            }
            if (!isset($this->dtd[$name]['type']) or $this->dtd[$name]['type'] != 'unique') {
                if ($name == $this->current_node[0]) {
                    $tagname = array_shift($this->current_node);
                    $this->current_construct .= "</$tagname>";
                } elseif ($positions = array_keys($this->current_node, $name)) {
                    $found = true;
                    $array = array_slice($this->current_node, 0, $positions[0]);
                    if (isset($this->dtd[$name]['default_parent'])
                        and in_array($this->dtd[$name]['default_parent'], $array)) {
                        $found = false;
                    }
                    if ($found) {
                        for ($i = 0; $i <= $positions[0]; $i++) {
                            $tagname = array_shift($this->current_node);
                            $this->current_construct .= "</$tagname>";
                        }
                    }
                } else {
                    foreach ($this->node as $key => $value) {
                        if ($name == $value[0]) {
                            $this->_switchCurrentNode($key);
                            $tagname = array_shift($this->current_node);
                            $this->current_construct .= "</$tagname>";
                            break;
                        }
                    }
                }
            }
        }
    }

    /**
     * Handling data (#PCDATA) in elements.
     *
     * @param  object  $parser
     * @param  string  $data
     * @return void
     * @access public
     */
    function dataHandler(&$parser, $data)
    {
        $data = preg_replace('/^[\t\r\n]*(.*)[\t\r\n]*$/', '$1', $data);
        if (strlen($data) > 0) {
            if (!empty($this->current_node)) {
                $this->_dataLookup($data);
            } else {
                $this->_appendNode(
                    $this->root[0],
                    (isset($this->root[1])? $this->root[1]: array())
                );
                $this->_dataLookup($data);
            }
        }
    }

    /**
     * Handling XML escapes (DOCTYPE declaration, Comment and CDATA section).
     *
     * @param  object  $parser
     * @param  string  $data
     * @return void
     * @access public
     */
    function escapeHandler(&$parser, $data)
    {
        $data = preg_replace('/^(-{2,}.*?)-*$/s', '$1--', $data);
        $this->current_construct .= "<!$data>";
    }

    /**
     * Handling processing instructions.
     *
     * @param  object  $parser
     * @param  string  $data
     * @return void
     * @access public
     */
    function piHandler(&$parser, $target, $data)
    {
    }

    /**
     * Handling JSP/ASP tags.
     *
     * @param  object  $parser
     * @param  string  $data
     * @return void
     * @access public
     */
    function jaspHandler(&$parser, $data)
    {
    }

    /**
     * @param  array   $array
     * @return void
     * @access public
     */
    function setRule($rule)
    {
        $this->dtd =& $rule;
    }

    /**
     * @param  string  $file
     * @return void
     * @access public
     */
    function setRuleFile($filename)
    {
        $this->dtd = require $filename;
    }

    /**
     * @param  string  $encoding
     * @return string
     * @access public
     */
    function dump($encoding = 'UTF-8')
    {
        $result = $this->construct[$this->root[0]];
        unset($this->construct[$this->root[0]]);
        foreach ($this->construct as $key => $value) {
            $result .= $value;
            if (!empty($this->node[$key])) {
                foreach ($this->node[$key] as $value) {
                    $result .= "</$value>";
                }
            }
        }
        if (!empty($this->node[$this->root[0]])) {
            foreach ($this->node[$this->root[0]] as $value) {
                $result .= "</$value>";
            }
        }
        if ($encoding != 'UTF-8'
            and function_exists('mb_convert_variables')) {
            mb_convert_variables($encoding, 'UTF-8', $result);
        }
        return $result;
    }

    /**
     * Specify the root element of the document.
     * If the name of the first element of the parsed document
     * does not match the name of the root element you specified,
     * the root element is automatically supplied.
     * This will help you when you need a fully XML compliant output
     * which must have a root element.
     * Note: Attributes are NOT evaluated.
     *
     * Example:
     * <code>
     * $parser->setRoot(
     *   'html',
     *   array(
     *     'xmlns' => 'http://www.w3.org/1999/xhtml',
     *     'xml:lang' => 'ja'
     *   )
     * );
     * </code>
     *
     * @param  string  $name
     * @param  array   $attribs
     * @return void
     * @access public
     */
    function setRoot($name, $attribs = array())
    {
        $this->root = array($name, $attribs);
    }

    /**
     * @param  string
     * @return void
     * @access public
     */
    function setGenericParent($name)
    {
        $this->generic_parent = $name;
    }

    /**
     * @param  mixed
     * @return void
     * @access public
     */
    function setTagsToSave()
    {
        $args = func_get_args();
        foreach ($args as $arg) {
            if (is_array($arg)) {
                $this->tags_to_save = array_merge($this->tags_to_save, $arg);
            } else {
                $this->tags_to_save[] = $arg;
            }
        }
    }

    /**
     * @param  string  $encoding
     * @return array
     * @access public
     */
    function getSavedTags($encoding = 'UTF-8')
    {
        if ($encoding != 'UTF-8'
            and function_exists('mb_convert_variables')) {
            mb_convert_variables($encoding, 'UTF-8', $this->saved_tags);
        }
        return $this->saved_tags;
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @return void
     * @access protected
     */
    function _switchCurrentNode($name, $attribs = array())
    {
        if (!isset($this->node[$name])) {
            $this->node[$name] = array($name);
        }
        $this->current_node =& $this->node[$name];
        if (!isset($this->construct[$name])) {
            $this->construct[$name] = $this->_formatOpenTag($name, $attribs);
        }
        $this->current_construct =& $this->construct[$name];
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @return void
     * @access protected
     */
    function _elementLookup($name, $attribs)
    {
        if (in_array($name, $this->dtd[$this->current_node[0]]['children'])) {
            $this->_appendNode($name, $attribs);
        } elseif (isset($this->dtd[$this->current_node[0]]['ignore_invalid_children'])) {
            if (isset($this->dtd[$this->current_node[0]]['default_parent'])
                and in_array($name, $this->dtd[$this->dtd[$this->current_node[0]]['default_parent']]['children'])) {
                $this->_appendNode($name, $attribs, 1);
            }
        } elseif (isset($this->dtd[$name]['default_parent'])
            and isset($this->dtd[$this->current_node[0]]['default_child'])
            and $this->dtd[$name]['default_parent'] == $this->dtd[$this->current_node[0]]['default_child']) {
            $this->_appendNode($this->dtd[$name]['default_parent']);
            $this->_appendNode($name, $attribs);
        } else {
            $found = false;
            if (!$found and isset($this->dtd[$this->current_node[0]]['default_child'])) {
                $tagname = $this->dtd[$this->current_node[0]]['default_child'];
                $array = array($tagname);
                while (isset($this->dtd[$tagname]['default_child'])) {
                    $tagname = $this->dtd[$tagname]['default_child'];
                    $array[] = $tagname;
                }
                if (in_array($name, $this->dtd[$array[count($array) -1]]['children'])) {
                    $found = true;
                    foreach ($array as $value) {
                        $this->_appendNode($value);
                    }
                    $this->_appendNode($name, $attribs);
                }
            }
            if (!$found and $this->_lookupNodeTree($name, $attribs)) {
                $found = true;
            }
            if (!$found) {
                $tagname = isset($this->dtd[$name]['default_parent'])?
                    $this->dtd[$name]['default_parent']:
                    (isset($this->generic_parent)? $this->generic_parent: null);
                if ($tagname) {
                    if (isset($this->dtd[$tagname]['type']) and $this->dtd[$tagname]['type'] == 'unique') {
                        $this->_switchCurrentNode($tagname);
                        $this->_appendNode($name, $attribs);
                    } else {
                        if ($this->_lookupNodeTree($tagname)) {
                            $this->_appendNode($name, $attribs);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param  string  $data
     * @return void
     * @access protected
     */
    function _dataLookup($data)
    {
        if (in_array('#PCDATA', $this->dtd[$this->current_node[0]]['children'])) {
            $this->_appendData($data);
        } elseif (!preg_match('/^\s*$/s', $data)
            and !isset($this->dtd[$this->current_node[0]]['ignore_invalid_children'])
            and isset($this->dtd[$this->current_node[0]]['default_child'])) {
            $tagname = $this->dtd[$this->current_node[0]]['default_child'];
            $array = array($tagname);
            while (isset($this->dtd[$tagname]['default_child'])) {
                $tagname = $this->dtd[$tagname]['default_child'];
                $array[] = $tagname;
            }
            if (in_array('#PCDATA', $this->dtd[$array[count($array) -1]]['children'])) {
                foreach ($array as $value) {
                    $this->_appendNode($value);
                }
                $this->_appendData($data);
            }
        }
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @return boolean
     * @access protected
     */
    function _lookupNodeTree($name, $attribs = array())
    {
        $limit = count($this->current_node);
        for ($i = 0; $i < $limit; $i++) {
            if (in_array($name, $this->dtd[$this->current_node[$i]]['children'])) {
                if (!isset($this->current_node[$i -1])
                    or !in_array($this->current_node[$i -1], $this->dtd[$name]['children'])) {
                    $this->_appendNode($name, $attribs, $i);
                } else {
                    $this->_insertNode($name, $attribs, $i);
                }
                return true;
                break;
            } elseif (
                (isset($this->dtd[$name]['type'])
                and $this->dtd[$name]['type'] == 'inline'
                and isset($this->dtd[$this->current_node[$i]]['type'])
                and $this->dtd[$this->current_node[$i]]['type'] == 'block')
                or
                (isset($this->dtd[$name]['default_parent'])
                and isset($this->dtd[$this->dtd[$name]['default_parent']]['default_parent'])
                and $this->current_node[$i] == $this->dtd[$this->dtd[$name]['default_parent']]['default_parent'])
                ) {
                return false;
                break;
            }
        }
        return false;
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @param  integer $position
     * @return void
     * @access protected
     */
    function _appendNode($name, $attribs = array(), $position = 0)
    {
        if (isset($this->dtd[$name]['type'])
            and $this->dtd[$name]['type'] == 'unique') {
            $this->_switchCurrentNode($name, $attribs);
        } else {
            while ($position > 0) {
                $this->current_construct .= '</'.$this->current_node[0].'>';
                array_shift($this->current_node);
                $position--;
            }
            $this->current_construct .= $this->_formatOpenTag($name, $attribs);
            // If the element does not have children, it shall be self-closed.
            // This means that the element name is not added
            // to the array representing the current node tree.
            if (!empty($this->dtd[$name]['children'])) {
                array_unshift($this->current_node, $name);
            }
        }
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @param  integer $position
     * @return void
     * @access protected
     */
    function _insertNode($name, $attribs = array(), $position = 0)
    {
        $tag = $this->current_node[$position -1];
        preg_match_all("/<$tag\b[^>]*?>/", $this->current_construct, $matches, PREG_OFFSET_CAPTURE);
        $tags = $matches[0];
        preg_match_all("/<\/$tag>/", $this->current_construct, $matches, PREG_OFFSET_CAPTURE);
        foreach ($matches[0] as $value) {
            $limit = count($tags);
            for ($i = 0; $i < $limit; $i++) {
                if ($value[1] > $tags[$i][1]
                    and (!isset($tags[$i +1][1]) or $value[1] < $tags[$i +1][1])) {
                    if (!isset($tags[$i][2])) {
                        $tags[$i][2] = $value[1];
                    } else {
                        for ($ii = $i; $ii >= 0; $ii--) {
                            if (!isset($tags[$ii][2])) {
                                $tags[$ii][2] = $value[1];
                                break;
                            }
                        }
                    }
                    break;
                }
            }
        }
        foreach ($tags as $key => $value) {
            if (isset($value[2])) {
                unset($tags[$key]);
            }
        }
        $tags = array_reverse($tags);
        $tags_pos = array_keys($this->current_node, $tag);
        $limit = count($tags_pos);
        for ($i = 0; $i < $limit; $i++) {
            if ($tags_pos[$i] == $position -1) {
                $this->current_construct = substr_replace(
                    $this->current_construct,
                    $this->_formatOpenTag($name, $attribs),
                    $tags[$i][1],
                    0
                );
                array_splice($this->current_node, $position, 0, $name);
                break;
            }
        }
    }

    /**
     * @param  string  $data
     * @return void
     * @access protected
     */
    function _appendData($data)
    {
        $this->_escapeChars($data);
        $this->current_construct .= $data;
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @return boolean
     * @access protected
     */
    function _checkAttributes($name, &$attribs)
    {
        if (!empty($attribs)) {
            $array = array();
            foreach ($attribs as $key => $value) {
                $key = strtolower($key);
                if (in_array($key, $this->dtd[$name]['attributes'])) {
                    if (empty($value)
                        and in_array($key, $this->html_minimized_attributes)) {
                        $value = $key;
                    } else {
                        $this->_escapeChars($value);
                    }
                    $array[$key] = $value;
                }
            }
            $attribs = $array;
        }
        if (isset($this->dtd[$name]['required_attribute'])
            and !isset($attribs[$this->dtd[$name]['required_attribute']])) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @return string
     * @access protected
     */
    function _formatOpenTag($name, $attribs = array())
    {
        $tag = "<$name";
        if (!empty($attribs)) {
            foreach ($attribs as $key => $value) {
                $tag .= " $key=\"$value\"";
            }
        }
        $tag .= empty($this->dtd[$name]['children'])? ' />': '>';
        return $tag;
    }

    /**
     * @param  string  $string
     * @return void
     * @access protected
     */
    function _escapeChars(&$string)
    {
        $string = preg_replace('/&(?!(?:[a-zA-Z]+|#[0-9]+|#x[0-9a-fA-F]+);)/', '&amp;', $string);
        $string = str_replace('<', '&lt;', $string);
        $string = str_replace('>', '&gt;', $string);
        $string = str_replace('"', '&quot;', $string);
    }

    /**
     * @param  string  $name
     * @param  array   $attribs
     * @return void
     * @access protected
     */
    function _saveTag($name, $attribs)
    {
        if (!empty($attribs)) {
            $this->saved_tags[$name][] = $attribs;
        }
    }
}

?>
