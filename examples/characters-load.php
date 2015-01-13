<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

// This is Apocalypse loaded into a \Marvel\Character object
$character = $client->characters->load(1009156);
echo $character->id . ' ' . $character->name . "\n";

// This is a nonexistent comic, so we get an empty array back
$character = $client->characters->load(1);
echo $character->id . ' ' . $character->name . "\n";