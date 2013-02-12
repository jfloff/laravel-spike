<?php

// CONFIG
$hostname = 'laravel-spike.dev:8888/api/url/bye';

// DATA
$name = json_encode(['name' => 'Joao']);

// curl request
$ch = curl_init($hostname);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $name);

// JSON
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($name)
));

$result = curl_exec($ch);
echo "\n";
