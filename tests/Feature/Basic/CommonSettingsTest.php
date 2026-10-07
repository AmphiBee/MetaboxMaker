<?php

declare(strict_types=1);

use AmphiBee\MetaboxMaker\Fields\Number;
use AmphiBee\MetaboxMaker\Fields\Text;

test('any field accepts custom HTML attributes', function () {
    $config = Text::make('Code', 'code')
        ->attributes(['maxlength' => 6, 'pattern' => '[A-Z0-9]+'])
        ->attribute('data-rules', ['upper' => true])
        ->build();

    expect($config['attributes'])->toBe([
        'maxlength' => 6,
        'pattern' => '[A-Z0-9]+',
        'data-rules' => '{"upper":true}',
    ]);
});

test('fields support wrapper, saving and visibility settings', function () {
    $config = Number::make('Score', 'score')
        ->class('score-field')
        ->before('<div class="score">')
        ->after('</div>')
        ->saveField(false)
        ->sanitizeCallback('absint')
        ->hideFromRest()
        ->hideFromFront()
        ->build();

    expect($config)->toMatchArray([
        'class' => 'score-field',
        'before' => '<div class="score">',
        'after' => '</div>',
        'save_field' => false,
        'sanitize_callback' => 'absint',
        'hide_from_rest' => true,
        'hide_from_front' => true,
    ]);
});

test('unset common settings are not emitted', function () {
    expect(Text::make('Title', 'title')->build())
        ->not->toHaveKeys(['attributes', 'class', 'before', 'after', 'save_field', 'sanitize_callback', 'hide_from_rest', 'hide_from_front']);
});
