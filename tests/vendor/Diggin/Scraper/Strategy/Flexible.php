<?php

/**
 * Diggin - Simplicity PHP Library
 * 
 * LICENSE
 *
 * This source file is subject to the new BSD license.
 * It is also available through the world-wide-web at this URL:
 * http://diggin.musicrider.com/LICENSE
 * 
 * @category   Diggin
 * @package    Diggin_Scraper
 * @copyright  2006-2010 sasezaki (http://diggin.musicrider.com)
 * @license    http://diggin.musicrider.com/LICENSE     New BSD License
 */

/**
 * @see Diggin_Scraper_Strategy_Abstract
 */
require_once 'Diggin/Scraper/Strategy/Abstract.php';
/**
 * @see Zend_Dom_Query_Css2Xpath
 */
require_once 'Zend/Dom/Query/Css2Xpath.php';
 
/**
 * @see Diggin_Scraper_Evaluator_Simplexml
 */
require_once 'Diggin/Scraper/Evaluator/Simplexml.php';

class Diggin_Scraper_Strategy_Flexible extends Diggin_Scraper_Strategy_Abstract
{
    protected $_evaluator;
    
    public function setAdapter(Diggin_Scraper_Adapter_Interface $adapter)
    {
        if (!($adapter instanceof Diggin_Scraper_Adapter_SimplexmlAbstract)) {
            require_once 'Diggin/Scraper/Strategy/Exception.php';
            $msg = get_class($adapter).' is not extends ';
            $msg .= 'Diggin_Scraper_Adapter_SimplexmlAbstract';
            throw new Diggin_Scraper_Strategy_Exception($msg);
        }

        $this->_adapter = $adapter;
    }

    public function getAdapter()
    {
        if (!isset($this->_adapter)) {
            /**
             * @see Diggin_Scraper_Adapter_Htmlscraping
             */
            require_once 'Diggin/Scraper/Adapter/Htmlscraping.php';
            $this->_adapter = new Diggin_Scraper_Adapter_Htmlscraping();
        }

        return $this->_adapter;
    }
    
    /**
     * Extarct values according process
     *
     * @param Diggin_Scraper_Wrapper_SimpleXMLElement $values
     * @param Diggin_Scraper_Process $process
     * @return array
     * @throws Diggin_Scraper_Strategy_Exception
     */
    public function extract($values, $process)
    {
        $results = (array) $values->xpath(self::_xpathOrCss2Xpath($process->getExpression()));

        // count($results) === 0 is not found by xpath-node
        // $results[0] === false is not found by attributes
        if (count($results) === 0 or ($results[0] === false)) {
            require_once 'Diggin/Scraper/Strategy/Exception.php';
            $exp = self::_xpathOrCss2Xpath($process->getExpression());
            throw new Diggin_Scraper_Strategy_Exception("Couldn't find By Xpath, Process :".$exp);
        }

        return $results;
    }

    protected static function _xpathOrCss2Xpath($exp)
    {
        if (preg_match('/^id\(/', $exp)) {
            return preg_replace("/^id\(((?:'|\")(\w*)(?:'|\"))\)/", '//*[@id=$1]', $exp);
        } else if (preg_match('#^(?:\.$|\./)#', $exp)) {
            return $exp;
        } else if (preg_match('!^/!', $exp)) {
            return '.'.$exp;
        } else {
            if (ctype_alnum($exp)) {
                return ".//$exp";
            } else {
                return '.'.preg_replace('#//+#', '//', str_replace(chr(32), '', Zend_Dom_Query_Css2Xpath::transform($exp)));
            }
        }
    }

    /**
     * Get Evaluator
     *
     * @return Diggin_Scraper_Evaluator_Simplexml
     */
    public function getEvaluator($values, $process)
    {
        $evaluator = new Diggin_Scraper_Evaluator_Simplexml($values, $process);
        $evaluator->setBaseUri($this->_getBaseUri());
        return $evaluator;
    }

    /**
     * Get Base Uri object
     * 
     * 
     * @return Diggin_Uri_Http
     */
    protected function _getBaseuri()
    {
        if (!$this->_baseUri instanceof Diggin_Uri_Http) {
            $simplexml = $this->readResource();
            require_once 'Diggin/Scraper/Helper/Simplexml/HeadBaseHref.php';
            $headBase = new Diggin_Scraper_Helper_Simplexml_HeadBaseHref($simplexml);
            $headBase->setOption(array('baseUrl' => $this->_baseUri));
            require_once 'Diggin/Uri/Http.php';
            $this->_baseUri = new Diggin_Uri_Http;
            $this->_baseUri->setBaseUri($headBase->getBaseUrl());

        }

        return $this->_baseUri;
    }

}
