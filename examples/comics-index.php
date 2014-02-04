<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);
$comics = $client->comics->index(1, 25);

foreach ($comics as $comic) {
    echo $comic->title . "\n";
}
