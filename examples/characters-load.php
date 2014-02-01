<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$client = new Services_Marvel($public_key, $private_key);
$character = $client->characters->get(1009521);

echo $character->id . ' ' . $character->name . "\n";