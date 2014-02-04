<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is Civil War loaded into a Services_Marvel_Event object
    $event = $client->events->get(238);
    echo $event->title . "\n";

    // This is a nonexistent event, so we get the exception
    $event = $client->events->get(1);
    echo $event->title . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
