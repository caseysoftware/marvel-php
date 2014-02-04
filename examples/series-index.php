<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);
$serii = $client->series->index(1, 25);

foreach ($serii as $series) {
    echo $series->title . "\n";
}
