<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

$client = new \Marvel\Client($public_key, $private_key);

$story = $client->stories->load(31556);
echo $story->title . "\n" . $story->description . "\n";

// This is a nonexistent story, so we get the exception
$story = $client->stories->get(1);
echo $story->title . "\n" . $story->description . "\n";