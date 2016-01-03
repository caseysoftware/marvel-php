<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);
$comics = $client->comics->index(1, 25);

foreach ($comics as $comic) {
    echo $comic->title . "\n";
}