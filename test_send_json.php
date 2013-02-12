<?php

// CONFIG
$hostname = 'laravel-spike.dev:8888/api/v1/url';
$user = 'firstuser';
$pwd = 'first_password';

// DATA
$url_1 = json_encode(['url' => 'http://ist.utl.pt', 'description' => 'Ganda IST']);
$url_2 = json_encode(['url' => 'http://fideloper.com', 'description' => 'A Great Blog']);
$url_3 = json_encode(['url' => 'http://digitalsurgeons.com', 'description' => 'A Marketing Agency']);
$url_4 = json_encode(['url' => 'http://www.poppstrong.com/', 'description' => 'I feel for him']);
$url_5 = json_encode(['url' => 'http://yahoo.com']);

// curl --user firstuser:first_password -d 'url=http://google.com&description=A Search Engine' laravel-spike.dev:8888/api/v1/url
$ch = curl_init($hostname);
curl_setopt($ch, CURLOPT_USERPWD, $user . ':' . $pwd);

// for debuging of curl - old style
// $url_1 = 'url=http://google.com&description=IST';
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $url_1);

// JSON
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($url_1)
));

$result = curl_exec($ch);
echo "\n";
