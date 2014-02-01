<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is Joe Caramagna loaded into a Services_Marvel_Creator object
    $creator = $client->creators->get(5251);
    echo $creator->firstName . ' ' . $creator->lastName . "\n";

    // This is a nonexistent creator, so we get the exception
    $creator = $client->creators->get(1000000);
    echo $creator->firstName . ' ' . $creator->lastName . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}