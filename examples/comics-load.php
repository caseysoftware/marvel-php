<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is the Amazing Spider-Man #620 with the Deadpool variant
    $comic = $client->comics->get(31556);
    echo $comic->title . "\n" . $comic->description . "\n";

    // This is a nonexistent comic, so we get the exception
    $character = $client->comics->get(1);
    echo $comic->title . "\n" . $comic->description . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
