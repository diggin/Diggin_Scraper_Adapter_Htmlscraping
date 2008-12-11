<?php
/**
 * This class is a part of remodeling of HTMLScraping
 * 
 * @see http://www.rcdtokyo.com/etc/htmlscraping/
 */

/**
 * ---------------------------------------------------------------------
 * HTMLScraping class
 * ---------------------------------------------------------------------
 * PHP versions 5 (5.1.3 and later)
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

/**
 * Diggin - Simplicity PHP Library
 * 
 * @category   Diggin
 * @package    Diggin_Http
 * @subpackage Response_Encoding
 */

class Diggin_Http_Response_Encoding
{
    /**
     * encoding
     * 
     * @param string $responseBody
     * @param string $response->getHeader('content-type')
     * @param string $encodingto
     * @param string $convertVars (optional)
     * @return mixed
     * @throws Diggin_Http_Response_Encoder_Exception
     */
    public static function encode($responseBody, $contentType = null, $encodingto = 'UTF-8', $convertVars = array())
    {
        
        $encodingfrom = self::detect($responseBody, $contentType);
        
        /*
         * Use mbstring to convert character encoding if available.
         * Otherwise use iconv (iconv may try to detect character encoding automatically).
         * Do not trust the declared encoding and do conversion even if UTF-8.
         */
        if (extension_loaded('mbstring')) {
            @mb_convert_variables($encodingto, $encodingfrom, $responseBody, $convertVars);
        } else {
            if (false === $responseBody = @iconv($encodingfrom, $encodingto, $responseBody)) {
                require_once 'Diggin/Http/Response/Encoding/Exception.php';
                throw new Diggin_Http_Response_Encoding_Exception('Failed converting character encoding.');
            }
            foreach ($convertVars as $key => $value) {
                if (false === $convertVars[$key] = @iconv($encodingfrom, $encodingto, $value)) {
                    require_once 'Diggin/Http/Response/Encoding/Exception.php';
                    throw new Diggin_Http_Response_Encoding_Exception('Failed converting character encoding.');
                }
            }
        }
        return (count(func_get_args()) === 4) ? array($responseBody, $convertVars): $responseBody;
    }
    
    /**
     * encode from response object
     *
     * @param object $response
     * @return string
     */
    public static function encodeResponseObject($response, $encodingto = 'UTF-8')
    {
        if ($response instanceof Zend_Http_Response or
            $response instanceof HTTP_Request2_Response) {
            return self::encode($response->getBody(), 
                                $response->getHeader('content-type'),
                                $encodingto);
        } else {
            require_once 'Diggin/Http/Response/Encoding/Exception.php';
            throw new Diggin_Http_Response_Encoding_Exception('Unknown Object Type..');
        }
    }
    
    /**
     * detect response encoding (html)
     *
     * @param string $responseBody
     * @param string $contentType
     * @return string $encoding
     */
    public static function detect($responseBody, $contentType = null)
    {
        $encoding = false;
        if (isset($contentType)) {
            $encoding = self::_getCharsetFromCType($contentType);
        }
        if (!$encoding and preg_match_all('/<meta\b[^>]*?>/si', $responseBody, $matches)) {
            foreach ($matches[0] as $value) {
                if (strtolower(self::_getAttribute('http-equiv', $value)) == 'content-type'
                    and false !== $encoding = self::_getAttribute('content', $value)) {
                    $encoding = self::_getCharsetFromCType($encoding);
                    break;
                }
            }
        }

        /*
         * Use mbstring to convert character encoding if available.
         * Otherwise use iconv (iconv may try to detect character encoding automatically).
         * Do not trust the declared encoding and do conversion even if UTF-8.
         */
        if (extension_loaded('mbstring')) {
            if (!$encoding) {
                @mb_detect_order('ASCII, JIS, UTF-8, EUC-JP, SJIS');
                if (false === $encoding = @mb_preferred_mime_name(@mb_detect_encoding($responseBody))) {
                    require_once 'Diggin/Http/Response/Encoding/Exception.php';
                    throw new Diggin_Http_Response_Encoding_Exception('Failed detecting character encoding.');
                }
            }
        }
        
        return $encoding;
    }

    /**
     * @param  string  $string
     * @return mixed
     */
    protected static function _getCharsetFromCType($string)
    {
        $array = explode(';', $string);
        /* array_walk($array, create_function('$item', 'return trim($item);')); */
        if (isset($array[1])) {
            $array = explode('=', $array[1]);
            if (isset($array[1])) {
                $charset = trim($array[1]);
                if (preg_match('/^UTF-?8$/i', $charset)) {
                    return 'UTF-8';
                } elseif (function_exists('mb_preferred_mime_name')) {
                    return @mb_preferred_mime_name($charset);
                } else {
                    return $charset;
                }
            }
        }
        return false;
    }

    /**
     * Get Attribute from meta-tags
     * 
     * @param string $name:
     * @param string $string:
     * @return mixed
     */
    protected static function _getAttribute($name, $string)
    {
        $search = "'[\s\'\"]\b".$name."\b\s*=\s*([^\s\'\">]+|\'[^\']+\'|\"[^\"]+\")'si";
        if (preg_match($search, $string, $matches)) {
            return preg_replace('/^\s*[\'\"](.+)[\'\"]\s*$/s', '$1', $matches[1]);
        } else {
            return false;
        }
    }
}
