<?php
use AmphiBee\MetaboxMaker\Fields\GoogleMap;
test('google map field is properly configured', function () {
    $googleMapField = GoogleMap::make('Map Location', 'map_location');
    $googleMapField->apiKey('YOUR_API_KEY')
        ->defaultLocation('53.346881,-6.258860')
        ->addressField('address1,address2')
        ->language('en')
        ->region('IE');

    $config = $googleMapField->build();

    expect($config)->toMatchArray([
        'type' => 'google_map',
        'name' => 'Map Location',
        'id' => 'map_location',
        'api_key' => 'YOUR_API_KEY',
        'std' => '53.346881,-6.258860',
        'address_field' => 'address1,address2',
        'language' => 'en',
        'region' => 'IE'
    ]);
});
