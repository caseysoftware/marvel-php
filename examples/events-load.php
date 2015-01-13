<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

// This is Civil War loaded into a Services_Marvel_Event object
$event = $client->events->load(238);
echo $event->title . "\n";

// This is a nonexistent event, so we get the exception
$event = $client->events->load(1);
echo $event->title . "\n";