<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    $character = $client->characters->get(1009368);
    echo $character->id . "\t" . $character->name . "\n";

    $comics = $character->comics();
    echo $comics->available . "\t" . $comics->collectionURI . "\n";

    $series = $character->series();
    echo $series->available . "\t" . $series->collectionURI . "\n";

    $stories = $character->stories();
    echo $stories->available . "\t" . $stories->collectionURI . "\n";

    $events = $character->events();
    echo $events->available . "\t" . $events->collectionURI . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}