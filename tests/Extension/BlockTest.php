<?php

use AmphiBee\MetaboxMaker\Block;

it('can initialize a block', function () {
    $block = Block::make('Test Block', 'test-block');

    expect($block)->toBeInstanceOf(Block::class)
        ->and($block->build()['title'])->toBe('Test Block')
        ->and($block->build()['id'])->toBe('test-block');
});

it('can configure a block', function () {
    $block = Block::make('Test Block', 'test-block')
        ->description('A test block')
        ->icon('book-alt')
        ->category('layout')
        ->renderCallback(function ($attributes) {
            return 'Rendered content';
        })
        ->enqueueStyle('https://example.com/style.css')
        ->enqueueScript('https://example.com/script.js')
        ->supports(['align' => ['wide', 'full']])
        ->mode('edit')
        ->preview(['title' => 'Preview Title'])
        ->storageType('attributes');

    $settings = $block->build();

    expect($settings['description'])->toBe('A test block')
        ->and($settings['icon'])->toBe('book-alt')
        ->and($settings['category'])->toBe('layout')
        ->and($settings['render_callback'])->toBeCallable()
        ->and($settings['enqueue_style'])->toBe('https://example.com/style.css')
        ->and($settings['enqueue_script'])->toBe('https://example.com/script.js')
        ->and($settings['supports'])->toBe(['align' => ['wide', 'full']])
        ->and($settings['mode'])->toBe('edit')
        ->and($settings['preview'])->toBe(['title' => 'Preview Title'])
        ->and($settings['storage_type'])->toBe('attributes');
}); 