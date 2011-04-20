<?php
require_once 'PHPUnit/Autoload.php';

$libraryPath = dirname(__DIR__).'/library';
$vendor = __DIR__.'/vendor/';

set_include_path($vendor . PATH_SEPARATOR .
        $libraryPath 
        . PATH_SEPARATOR . get_include_path()
        );
