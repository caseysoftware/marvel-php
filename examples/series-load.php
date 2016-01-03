<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);


$series = $client->series->load(454);
echo $series->title . "\n";

// This is a nonexistent series, so we get the exception
$series = $client->series->load(1);
echo $series->title . "\n";