<?php

use AmphiBee\MetaboxMaker\Fields\Options\InputTextType;
use AmphiBee\MetaboxMaker\Fields\Text;

test('Field: text with all properties', function () {
    $args = Text::make('Website URL', 'website_url')
        ->type(InputTextType::URL)  // Using the enum to set the type
        ->placeholder('Enter your website URL')
        ->size(30)
        ->prepend('https://')
        ->append('.com')
        ->datalist('website_url_list', ['google.com', 'example.com'])
        ->placeholder('Enter your website URL')
        ->required()
        ->labelDescription('This is a label description')
        ->description('This is a field description')
        ->default('Default value')
        ->disabled()
        ->readOnly()
        ->multiple()
        ->cloneable()
        ->sortable()
        ->cloneDefaults()
        ->cloneAsMultiple()
        ->maxClones(5)
        ->minClones(1)
        ->addButton('Add More Text')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'url',  // The enum value
        'name' => 'Website URL',
        'id' => 'website_url',
        'placeholder' => 'Enter your website URL',
        'size' => 30,
        'prepend' => 'https://',
        'append' => '.com',
        'datalist' => [
            'id' => 'website_url_list',
            'options' => ['google.com', 'example.com']
        ],
        'required' => true,
        'label_description' => 'This is a label description',
        'desc' => 'This is a field description',
        'std' => 'Default value',
        'disabled' => true,
        'readonly' => true,
        'multiple' => true,
        'clone' => true,
        'sort_clone' => true,
        'clone_default' => true,
        'clone_as_multiple' => true,
        'max_clone' => 5,
        'min_clone' => 1,
        'add_button' => 'Add More Text',
        'attributes' => []  // Ensure any other generic attributes or conditions are tested here if needed
    ]);
});

test('Field: text with string type', function () {
    $args = Text::make('Email', 'email')
        ->type('email')  // Using the string to set the type
        ->build();

    expect($args)->toMatchArray([
        'type' => 'email',  // The enum value
        'name' => 'Email',
        'id' => 'email',
    ]);
});

/*
it('throws an exception for invalid field type string', function () {
    Text::make('Invalid Type Field', 'invalid_type')
        ->type('invalid');  // This should be an invalid type and trigger the exception
})->throws(\InvalidArgumentException::class, "Invalid type specified. Allowed types are 'text', 'url', or 'email'.");

it('throws an exception for incorrect type usage', function () {
    Text::make('Incorrect Type Usage', 'incorrect_usage')
        ->type(123);  // This is an incorrect usage, passing an integer instead of string or FieldType
})->throws(\InvalidArgumentException::class, "Type must be either a string or an instance of FieldType.");*/
