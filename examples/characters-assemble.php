<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);

try {
    $team = $client->characters->assemble();

    foreach ($team as $member) {
        echo $member->name . "\n";
    }
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
