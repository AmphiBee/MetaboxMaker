<?php

declare(strict_types=1);

use Pollora\Metabox\Fields\Divider;

test('can initialize divider field', function () {
    $divider = new Divider;

    expect($divider->build())->toMatchArray([
        'type' => 'divider',
    ]);
});
