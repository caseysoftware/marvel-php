<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is the Amazing Spider-Man #620 with the Deadpool variant
    $comic = $client->comics->get(31556);
    echo $comic->id . "\t" . $comic->title . "\n";

    $characters = $comic->characters();
    echo $characters->available . "\t" . $characters->collectionURI . "\n";

    $creators = $comic->creators();
    echo $creators->available . "\t" . $creators->collectionURI . "\n";

    $series = $comic->series();
    echo $series->available . "\t" . $series->collectionURI . "\n";

    $stories = $comic->stories();
    echo $stories->available . "\t" . $stories->collectionURI . "\n";

    $events = $comic->events();
    echo $events->available . "\t" . $events->collectionURI . "\n";

} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}