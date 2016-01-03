<?php

include_once '../credentials.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

try {
    $event = $client->events->load(238);
    echo $event->title . "\n";

    $characters = $event->characters();
    echo $characters->available . "\t" . $characters->collectionURI . "\n";

    $comics = $event->comics();
    echo $comics->available . "\t" . $comics->collectionURI . "\n";

    $creators = $event->creators();
    echo $creators->available . "\t" . $creators->collectionURI . "\n";

    $series = $event->series();
    echo $series->available . "\t" . $series->collectionURI . "\n";

    $stories = $event->stories();
    echo $stories->available . "\t" . $stories->collectionURI . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
