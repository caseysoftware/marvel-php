<?php

include_once '../creds.php';
include_once '../vendor/autoload.php';

/**
 * This implementation doesn't authenticate until the request is actually made.
 *    I believe it is better fundamentally because it doesn't retain a state
 *    between requests.
 */
$client = new \Marvel\Client($public_key, $private_key);

$comics = $client->comics->index();

echo $comics->code . "\n";
echo $comics->total . " comics \n\n";