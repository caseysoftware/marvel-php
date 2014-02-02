<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is Ant Man Hank Pym loaded into a Services_Marvel_Character object
    $story = $client->stories->get(31556);
    echo $story->title . "\n" . $story->description . "\n";

    // This is a nonexistent character, so we get the exception
    $story = $client->stories->get(1);
    echo $story->title . "\n" . $story->description . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}