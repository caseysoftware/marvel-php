<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);
$creators = $client->creators->index(1, 25);

foreach($creators as $creator) {
    echo $creator->fullName . "\n";
}