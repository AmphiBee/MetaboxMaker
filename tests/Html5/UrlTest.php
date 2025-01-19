<?php

use AmphiBee\MetaboxMaker\Fields\Url;

it('can create a URL field', function () {
    $urlField = Url::make('Website', 'website')
        ->size(50)
        ->prepend('https://')
        ->append('.com');

    $settings = $urlField->build();

    expect($settings['type'])->toBe('url')
        ->and($settings['size'])->toBe(50)
        ->and($settings['prepend'])->toBe('https://')
        ->and($settings['append'])->toBe('.com');
}); 