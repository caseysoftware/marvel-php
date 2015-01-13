<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

try {
    $creator = $client->creators->load(5251);
    echo $creator->firstName . ' ' . $creator->lastName . "\n";

    $comics = $creator->comics();
    echo $comics->available . "\t" . $comics->collectionURI . "\n";

    $events = $creator->events();
    echo $events->available . "\t" . $events->collectionURI . "\n";

    $series = $creator->series();
    echo $series->available . "\t" . $series->collectionURI . "\n";

    $stories = $creator->stories();
    echo $stories->available . "\t" . $stories->collectionURI . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
