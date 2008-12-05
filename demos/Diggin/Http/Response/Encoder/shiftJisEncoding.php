<?php
require_once 'Diggin/Http/Response/Encoder.php';
require_once 'HTTP/Request2.php';

$req = new HTTP_Request2();
$req->setUrl('http://ugnews.net/');
$response = $req->send();
print_r($response->getHeader('content-type'));
//$req->getBody();

echo 'before encoding', PHP_EOL;
print_r(mb_substr(strip_tags($response->getBody()), 0, 200));

$body = Diggin_Http_Response_Encoder::encode($response->getBody(),
                                     $response->getHeader('content-type'), 'UTF-8');
                                     
echo PHP_EOL, 'after encoding', PHP_EOL;
print_r(mb_substr(strip_tags($body), 0, 200));