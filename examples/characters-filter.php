<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);
$characters = $client->characters->index(1, 25, array('name' => 'Deadpool'));

foreach ($characters as $character) {
    echo $character->name . "\n";
}
