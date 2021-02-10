<?php

require('../vendor/autoload.php');

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient();

// First, let's create some data in Firestore
$citiesRef = $db->collection('cities');
$citiesRef->document('SF')->set([
    'name' => 'San Francisco',
    'state' => 'CA',
    'country' => 'USA',
    'capital' => false,
    'population' => 860000,
    'regions' => ['west_coast', 'norcal']
]);
$citiesRef->document('LA')->set([
    'name' => 'Los Angeles',
    'state' => 'CA',
    'country' => 'USA',
    'capital' => false,
    'population' => 3900000,
    'regions' => ['west_coast', 'socal']
]);
$citiesRef->document('DC')->set([
    'name' => 'Washington D.C.',
    'state' => null,
    'country' => 'USA',
    'capital' => true,
    'population' => 680000,
    'regions' => ['east_coast']
]);
$citiesRef->document('TOK')->set([
    'name' => 'Tokyo',
    'state' => null,
    'country' => 'Japan',
    'capital' => true,
    'population' => 9000000,
    'regions' => ['kanto', 'honshu']
]);
$citiesRef->document('BJ')->set([
    'name' => 'Beijing',
    'state' => null,
    'country' => 'China',
    'capital' => true,
    'population' => 21500000,
    'regions' => ['jingjinji', 'hebei']
]);

// Now, let's make a query
$collection = $db->collection('cities');
$query = $collection->limit(25);
$documents = $query->documents();

foreach ($documents as $document) {
    print(sprintf('<pre>%s</pre>', print_r($document->data(), true)));
}

exit('We made it! Hurray!');
