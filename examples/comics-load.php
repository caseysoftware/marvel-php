<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

try {
    // This is the Amazing Spider-Man #620 with the Deadpool variant
    $comic = $client->comics->load(31556);
    echo $comic['title'] . "\n" . $comic['description'] . "\n";

    // This is a nonexistent comic, so we get an empty array back
    $comic = $client->comics->load(1);
    echo $comic['title'] . "\n" . $comic['description'] . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
