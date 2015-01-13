<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

$stories = $client->stories->index(1, 25);

foreach ($stories as $story) {
    echo $story['title'] . "\n";
}
