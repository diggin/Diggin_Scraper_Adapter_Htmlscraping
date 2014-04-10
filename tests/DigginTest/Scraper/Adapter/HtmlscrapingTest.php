<?php
namespace DigginTest\Scraper\Adapter;
use PHPUnit_Framework_TestCase;
use Diggin\Scraper\Adapter\Htmlscraping\Htmlscraping;
use Zend\Http\Response;

/**
 * Test class for Diggin_Scraper_Adapter_Htmlscraping.
 */
class HtmlscrapingTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var    Diggin_Scraper_Adapter_Htmlscraping
     */
    protected $object;
    
    protected $response;

    public static $environmentCheck;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new Htmlscraping;
        
        
        $responseHeader =            "HTTP/1.1 200 OK"        ."\r\n".
           "Date: Sat, 02 Aug 2008 15:17:11 GMT"."\r\n".
           "Server: Apache/2.2.6 (Win32) mod_ssl/2.2.6 OpenSSL/0.9.8e PHP/5.2.5"."\r\n".
           "Last-modified: Sun, 29 Jun 2008 21:20:50 GMT"."\r\n".
           "Accept-ranges: bytes"   . "\r\n" .
           "Content-length: 1000"   . "\r\n" .
           "Connection: close"      . "\r\n" .
           "Content-type: text/html; charset=utf-8;";
        $responseBody = '<html lang="ja">'.PHP_EOL.
                           '<head>'.PHP_EOL.
                           '<body>'.PHP_EOL.
                           'this is test&amp;test<br />'.PHP_EOL.
                           '<script type="text/javascript"><!--document.write("hello");//-></script>'.
                           '</body>'.PHP_EOL.
                           '</html>';
        $response_str = "$responseHeader\r\n\r\n$responseBody";
        
        $this->response = Response::fromString($response_str);

        if (!self::$environmentCheck) {
            $this->environmentCheck();
            self::$environmentCheck = true;
        }
    }

    public function environmentCheck()
    {
        if (extension_loaded('tidy')) {
            $this->assertInternalType('string', $this->object->getXhtml($this->response));
        } else {
            try {
                //$this->object->getXhtml($this->response);
                $this->object->getSimplexml($this->response);
                $this->fail('IF tidy is not available, should raise Exception ');
            } catch (\Diggin\Scraper\Adapter\Htmlscraping\EnvironmentException $e) {
                $vendor2 = dirname(dirname(dirname(__DIR__))).'/vendor2';
                set_include_path($vendor2.PATH_SEPARATOR.get_include_path());
                require_once 'HTMLParser.class.php';
                $this->assertInternalType('string', $this->object->getXhtml($this->response));
            }
        }
    }

    public function testGetXmlObject() 
    {
        $sxml = $this->object->getSimplexml($this->response);
        $this->assertInstanceOf('Diggin\\Scraper\\Adapter\\Wrapper\\SimpleXMLElement', $sxml);
    }

    public function testGetXhtml()
    {

        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'Should check valid HTML.'
        );
    }

    public function testNosetConfigAmpasandEscape()
    {
        $asxml = $this->object->getSimplexml($this->response)->asXML();
        $asx = explode('test', $asxml);
        $this->assertEquals('&amp;', $asx[1]);
    }

    public function testAmpasandEscape()
    {
        $this->object->setConfig(array('url' => 'http://test.org/',
                                       'pre_ampersand_escape' => true));
        $xhtml = $this->object->getXhtml($this->response);
        $xh = explode('test', $xhtml);
        $this->assertEquals('&amp;amp;', $xh[1]);

        $asxml = $this->object->getSimplexml($this->response)->asXML();
        $asx = explode('test', $asxml);
        $this->assertEquals('&amp;', $asx[1]);
        
        
        $this->object->setConfig(array('url' => 'http://test.org/',
                                       'pre_ampersand_escape' => false));
        $xhtml = $this->object->getXhtml($this->response);
        $xh2 = explode('test', $xhtml);
        
        $this->assertEquals('&amp;', $xh2[1]);
    }
    
    /**
     * testSetConfig().
     */
    public function testSetConfig() {
        $obj = new Htmlscraping();
        
        $obj->setConfig(array('url' => 'http://example.com/'));
        
        $this->assertAttributeEquals(
                array('tidy' => array('output-xhtml' => true,
                                'wrap' => 0,
                                /**'wrap-script-literals' => true*/),
                'pre_ampersand_escape' => false,
                'url' => 'http://example.com/'),

         'config', $obj); 
    }
    
    public function testSetConfigThrowException() {
        $obj = new Htmlscraping();
        
        $this->setExpectedException('Diggin\\Scraper\\Adapter\\Exception');
        $this->getExpectedException($obj->setConfig(false));
    }
}
