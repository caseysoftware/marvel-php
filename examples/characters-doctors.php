<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

$characters = $client->characters->index(1, 50, array('nameStartsWith' => 'Doctor'));

echo "There are " . $characters->count() . " doctors by name alone.\n";

foreach($characters as $character) {
    echo $character->id . "\t" . $character->name . "\n";
}