<?php

/**
 * Diggin_Http_Response_Charset
 * 
 * a part of this package (Diggin_Http_Response_Charset_Detector_Html) is
 * borrowed from HTMLScraping
 * 
 * @see http://www.rcdtokyo.com/etc/htmlscraping/
 *
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

class Diggin_Http_Response_Charset_Wrapper_Zf extends Zend_Http_Response 
{
    /**
     * @var Diggin_Http_Response_Charset_Front_ConvertInterface
     */
    private $_charsetfront;

    /**
     * @var string
     */
    private $_url;

    public function setCharsetFront(Diggin_Http_Response_Charset_Front_ConvertInterface $charsetfront)
    {
        $this->_charsetfront = $chasetfront;
    }

    public function getCharsetFront()
    {
        if (!$this->_charsetfront) {
            require_once 'Diggin/Http/Response/Charset/Front/UrlRegex.php';
            $this->_charsetfront = new Diggin_Http_Response_Charset_Front_UrlRegex;
        }

        return $this->_charsetfront;
    }
    
    public function getHeaders()
    {
        $headers = parent::getHeaders();
        return Diggin_Http_Response_Charset::clearHeadersCharset($headers);
    }

    public function getHeader($header)
    {
        $value = parent::getHeader($header);
        if ('Content-type' == ucwords(strtolower($header))) {
            $args = func_get_args();
            if (isset($args[1]) && true === $args[1]) {
                return parent::getHeader($header);
            }

            return Diggin_Http_Response_Charset::clearHeaderCharset($value);
        }

        return $value;
    }

    public function getBody()
    {
        $content = array('body' => parent::getBody(), 'content-type' => $this->getHeader('Content-type', true));
        $document = array('url' => $this->getUrl(), 'content' => $content);
        
        return $this->getCharsetFront()->convert($document);
    }

    public function setUrl($url)
    {
        $this->_url = $url;
    }

    public function getUrl()
    {
        return $this->_url;
    }
}
