<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    // This is Ant Man Hank Pym loaded into a Services_Marvel_Character object
    $character = $client->characters->get(1009521);
    echo $character->id . ' ' . $character->name . "\n";

    // This is a nonexistent character, so we get the exception
    $character = $client->characters->get(1);
    echo $character->id . ' ' . $character->name . "\n";
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
