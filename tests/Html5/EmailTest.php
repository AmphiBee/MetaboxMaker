<?php

use AmphiBee\MetaboxMaker\Fields\Email;

it('can create an Email field', function () {
    $emailField = Email::make('Email Address', 'email_address')
        ->size(30)
        ->prepend('user@')
        ->append('.com');

    $settings = $emailField->build();

    expect($settings['type'])->toBe('email')
        ->and($settings['size'])->toBe(30)
        ->and($settings['prepend'])->toBe('user@')
        ->and($settings['append'])->toBe('.com');
}); 