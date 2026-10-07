<?php

declare(strict_types=1);

use AmphiBee\MetaboxMaker\Fields\Divider;

test('can initialize divider field', function () {
    $divider = new Divider;

    expect($divider->build())->toMatchArray([
        'type' => 'divider',
    ]);
});
