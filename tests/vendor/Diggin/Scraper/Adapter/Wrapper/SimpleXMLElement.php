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
 * @subpackage Wrapper
 * @copyright  2006-2010 sasezaki (http://diggin.musicrider.com)
 * @license    http://diggin.musicrider.com/LICENSE     New BSD License
 */

class Diggin_Scraper_Adapter_Wrapper_SimpleXMLElement extends SimpleXMLElement
{
    public function asXML()
    {
         return htmlspecialchars_decode(parent::asXML(), ENT_NOQUOTES);
    }
}
