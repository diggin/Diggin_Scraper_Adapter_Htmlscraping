<?php

error_reporting( E_ALL | E_STRICT );

require_once dirname(__DIR__).'/vendor/SplClassLoader.php';

$base = dirname(__DIR__);

$src = $base.'/src/';
$vendor = $base.'/vendor';

$loader = new SplClassLoader('Diggin\\Scraper', dirname(__DIR__).'/vendor/Diggin_Scraper/src');
$loader->register();
$loader = new SplClassLoader('Diggin\\Http\\Charset', dirname(__DIR__).'/vendor/Diggin_Http_Charset/src');
$loader->register();
$loader = new SplClassLoader('Zend\\Uri', dirname(__DIR__).'/vendor/zend-uri');
$loader->register();
$loader = new SplClassLoader('Zend\\Stdlib', $vendor);
$loader->register();
$loader = new SplClassLoader('Zend\\Http', $vendor);
$loader->register();
$loader = new SplClassLoader('Zend\\Loader', $vendor);
$loader->register();

require_once $src.'Diggin/Scraper/Adapter/Htmlscraping.php';
require_once $src.'Diggin/Scraper/Adapter/Exception/HtmlscrapingEnvironmentException.php';

