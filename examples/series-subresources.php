<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

try {
    $series = $client->series->load(454);
    echo $series->title . "\n";

    $characters = $series->characters();
    echo $characters->available . "\t" . $characters->collectionURI . "\n";

    $comics = $series->comics();
    echo $comics->available . "\t" . $comics->collectionURI . "\n";

    $creators = $series->creators();
    echo $creators->available . "\t" . $creators->collectionURI . "\n";

    $events = $series->events();
    echo $events->available . "\t" . $events->collectionURI . "\n";

    $stories = $series->stories();
    echo $stories->available . "\t" . $stories->collectionURI . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
