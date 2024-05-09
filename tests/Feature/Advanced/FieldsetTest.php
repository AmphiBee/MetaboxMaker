<?php
use AmphiBee\MetaboxMaker\Fields\Fieldset;

test('fieldset field can be configured with multiple inputs', function () {
    $fieldset = Fieldset::make('User Details', 'user_details');
    $fieldset->inputs([
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email Address'
    ]);

    $config = $fieldset->build();

    expect($config)->toMatchArray([
        'type' => 'fieldset',
        'name' => 'User Details',
        'id' => 'user_details',
        'options' => [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email Address'
        ]
    ]);
});
