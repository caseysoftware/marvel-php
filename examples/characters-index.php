<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);
$characters = $client->characters->index(3, 25);

foreach ($characters as $character) {
    echo $character['name'] . "\n";
}
