<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

try {
    $team = $client->characters->assemble();

    foreach ($team as $member) {
        echo $member['name'] . "\n";
    }
} catch (Exception $exc) {
    echo $exc->getMessage() . "\n";
}
