<?php

include_once '../creds.php';
include_once '../Services/Marvel.php';

$foundDoctors = false;
$doctors = array();

// First initiatialize the Marvel client object, it does all the heavy lifting.
$client = new Services_Marvel($public_key, $private_key);

for ($i = 5; $i < 20; $i++) {
    // Use the Characters resource to retrieve one page of characters
    $characters = $client->characters->index($i, 25);

    // Iterate over the characters looking at their names
    foreach ($characters as $character) {
        if (strpos($character->name, 'Doctor') !== false) {
            $foundDoctors = true;
            $doctors[] = $character;
        }
    }
    // Once we've found doctors and reached the end of the page, bail out of the loop
    if ($foundDoctors) {
        break;
    }
}

echo "There are " . count($doctors) . " doctors by name alone.\n";

foreach($doctors as $doctor) {
    echo $doctor->id . "\t" . $doctor->name . "\n";
}