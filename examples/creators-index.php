<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

$creators = $client->creators->index(1, 25);

foreach ($creators as $creator) {
    echo $creator->fullName . "\n";
}
