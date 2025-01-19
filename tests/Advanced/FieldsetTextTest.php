<?php

use AmphiBee\MetaboxMaker\Fields\FieldsetText;

it('can create a fieldset text field', function () {
    $fieldsetText = FieldsetText::make('Contact Information', 'contact_info')
        ->options([
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ]);

    $settings = $fieldsetText->build();

    expect($settings['type'])->toBe('fieldset_text')
        ->and($settings['options'])->toBe([
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
        ]);
}); 