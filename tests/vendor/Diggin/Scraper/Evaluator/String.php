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
 * @subpackage Evaluator
 * @copyright  2006-2010 sasezaki (http://diggin.musicrider.com)
 * @license    http://diggin.musicrider.com/LICENSE     New BSD License
 */

/** Diggin_Scraper_Evaluator_Abstract */
require_once 'Diggin/Scraper/Evaluator/Abstract.php';

class Diggin_Scraper_Evaluator_String extends Diggin_Scraper_Evaluator_Abstract
{

    protected function _eval($string)
    {
        $type = $this->getProcess()->getType();

        switch (strtolower($type)) {
            case 'raw' :
                return $string;
            case 'text' :
                $value = strip_tags($string);
                $value = str_replace(array(chr(9), chr(10), chr(13)), '', $value);
                return $value;
        }

        require_once 'Diggin/Scraper/Evaluator/Exception.php';
        $process = $this->getProcess();
        throw new Diggin_Scraper_Evaluator_Exception($type." is unknown type ($process)");
    }
}
