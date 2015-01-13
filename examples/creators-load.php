<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

// This is Joe Caramagna loaded into a Services_Marvel_Creator object
$creator = $client->creators->load(5251);
echo $creator->firstName . ' ' . $creator->lastName . "\n";

// This is a nonexistent creator, so we get the exception
$creator = $client->creators->load(1000000);
echo $creator->firstName . ' ' . $creator->lastName . "\n";