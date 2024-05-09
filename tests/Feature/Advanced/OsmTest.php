<?php

use AmphiBee\MetaboxMaker\Fields\OpenStreetMap;

test('OSM field is properly configured', function () {
    $osmField = new OpenStreetMap('Map View', 'osm_field');
    $osmField->defaultLocation('48.8588443,2.2943506') // Coordinates for Eiffel Tower, Paris
        ->addressField('address_input')
        ->language('fr')
        ->region('FR');

    $config = $osmField->build();

    expect($config)->toMatchArray([
        'type' => 'osm',
        'name' => 'Map View',
        'id' => 'osm_field',
        'std' => '48.8588443,2.2943506',
        'address_field' => 'address_input',
        'language' => 'fr',
        'region' => 'FR',
    ]);
});
