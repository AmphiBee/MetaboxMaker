<?php

use AmphiBee\MetaboxMaker\Fields\Heading;

test('can initialize and configure heading field', function () {
    $heading = Heading::make('Section Title')
        ->description('An optional detailed description');

    expect($heading->build())->toMatchArray([
        'type' => 'heading',
        'name' => 'Section Title',
        'desc' => 'An optional detailed description',
    ]);
});
