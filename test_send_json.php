<?php

// CONFIG
$hostname = 'mayol.dev:8888/api/input/tamping-operations';

// DATA
$name = json_encode([
    [
        "line"               => 8,
        "track"              => "VA",
        "date"               => "2020-04-20",
        "kp_begin"           => 50.2,
        "kp_end"             => 60.4,
        "ext_op"             => 10.2,
        "stabilization"      => true,
        "ext_stabilization"  => 1.2,
        "regularization"     => false,
        "ext_regularization" => null,
        "ballast"            => true,
        "ballast_quantity"   => 400,
    ],
    [
        "line"               => 8,
        "track"              => "VA",
        "date"               => "2021-04-20",
        "kp_begin"           => 50.2,
        "kp_end"             => 60.4,
        "ext_op"             => 10.4,
        "stabilization"      => true,
        "ext_stabilization"  => 1.2,
        "regularization"     => false,
        "ext_regularization" => null,
        "ballast"            => true,
        "ballast_quantity"   => 400,
    ]
]);

// var_dump($name); die();

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
echo "\n\n" . curl_getinfo($ch, CURLINFO_HTTP_CODE) . "\n";
