<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is Ant Man Hank Pym loaded into a Services_Marvel_Character object
    $series = $client->series->get(454);
    echo $series->title . "\n";

    // This is a nonexistent character, so we get the exception
    $series = $client->series->get(1);
    echo $series->title . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
