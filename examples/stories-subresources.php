<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    $story = $client->stories->get(31556);
    echo $story->title . "\n" . $story->description . "\n";

    $comics = $story->comics();
    echo $comics->available . "\t" . $comics->collectionURI . "\n";

    $series = $story->series();
    // @todo The collectionURI here is an object instead of a string like it is specified in the docs.
    //echo $series->available . "\t" . $series->collectionURI . "\n";

    $events = $story->events();
    echo $events->available . "\t" . $events->collectionURI . "\n";

    $characters = $story->characters();
    echo $characters->available . "\t" . $characters->collectionURI . "\n";

    $creators = $story->creators();
    echo $creators->available . "\t" . $creators->collectionURI . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}