<?php
require_once 'Diggin/Http/Response/Encoding.php';
require_once 'HTTP/Request2.php';

$req = new HTTP_Request2();
$req->setUrl('http://d.hatena.ne.jp/sasezaki/');
$encoded = Diggin_Http_Response_Encoding::encodeResponseObject($req->send());

var_dump(strip_tags($encoded));  //utf-8