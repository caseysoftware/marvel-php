<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);
$serii = $client->series->index(1, 25);

foreach ($serii as $series) {
    echo $series->title . "\n";
}
