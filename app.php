<?php

include 'vendor/autoload.php';
include 'src/includes.php';


$dsn = 'mysql:host=127.0.01;dbname=olympics';
$user = 'root';
$password = null;

$database = new \App\Database();

$database->connect($dsn, $user, $password);


$sportArray = [
    'sport' => [
        'native' => 'sport_id',
        'foreign' => 'sport_id',
    ]
];

