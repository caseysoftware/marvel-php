<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

try {
    // This is Apocalypse loaded into a \Marvel\Character object
    $character = $client->characters->load(1009156);
    echo $character->id . "\t" . $character->name . "\n";

    $comics = $character->comics();
    echo $comics->available . "\t" . $comics->collectionURI . "\n";

    $events = $character->events();
    echo $events->available . "\t" . $events->collectionURI . "\n";

    $series = $character->series();
    echo $series->available . "\t" . $series->collectionURI . "\n";

    $stories = $character->stories();
    echo $stories->available . "\t" . $stories->collectionURI . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
