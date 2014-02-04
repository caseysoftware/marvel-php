<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);
$events = $client->events->index(1, 25);

foreach ($events as $event) {
    echo $event->title . "\n";
}
