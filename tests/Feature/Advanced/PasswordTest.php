<?php

use AmphiBee\MetaboxMaker\Fields\Password;

test('password field can be configured with a specific input size', function () {
    $passwordField = Password::make('User Password', 'user_password');
    $passwordField->size(30);

    $config = $passwordField->build();

    expect($config)->toMatchArray([
        'type' => 'password',
        'name' => 'User Password',
        'id' => 'user_password',
        'size' => 30,
    ]);
});
