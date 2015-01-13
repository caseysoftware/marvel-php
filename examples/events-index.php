<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);
$events = $client->events->index(1, 25);

foreach ($events as $event) {
    echo $event['title'] . "\n";
}
