<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

/**
 * This implementation doesn't authenticate until the request is actually made.
 *    I believe it is better fundamentally because it doesn't retain a state
 *    between requests.
 */
$client = new Services_Marvel(array('api_key' => $apiKey));

