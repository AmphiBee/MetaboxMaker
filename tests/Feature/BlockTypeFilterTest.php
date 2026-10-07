<?php

declare(strict_types=1);

use Pollora\Metabox\Block;
use Pollora\Metabox\Services\BlockTypeFilter;

function editorContext(string $postType): object
{
    return (object) ['post' => (object) ['post_type' => $postType]];
}

test('only filters the exact block, not blocks sharing a substring', function () {
    Block::make('Hero', 'hero')->restrictToPostTypes(['page']);

    $allowed = BlockTypeFilter::filterBlockTypes(
        ['meta-box/hero', 'meta-box/hero-banner', 'acme/hero', 'core/paragraph'],
        editorContext('post')
    );

    expect($allowed)->toBe(['meta-box/hero-banner', 'acme/hero', 'core/paragraph']);
});

test('keeps a restricted block on its allowed post types', function () {
    Block::make('Hero', 'hero')->restrictToPostTypes(['page']);

    expect(BlockTypeFilter::filterBlockTypes(['meta-box/hero'], editorContext('page')))
        ->toBe(['meta-box/hero']);
});

test('combines allowed and excluded post types', function () {
    Block::make('Cards', 'cards')
        ->restrictToPostTypes(['page', 'post'])
        ->excludePostTypes(['post']);

    expect(BlockTypeFilter::getRestrictions()['cards'])->toBe([
        'allowed' => ['page', 'post'],
        'excluded' => ['post'],
    ])
        ->and(BlockTypeFilter::filterBlockTypes(['meta-box/cards'], editorContext('post')))->toBe([])
        ->and(BlockTypeFilter::filterBlockTypes(['meta-box/cards'], editorContext('page')))->toBe(['meta-box/cards']);
});

test('keeps all blocks allowed when nothing is removed for the post type', function () {
    Block::make('Banner', 'banner')->restrictToPostTypes(['page']);

    expect(BlockTypeFilter::filterBlockTypes(true, editorContext('page')))->toBeTrue();
});

test('keeps an explicit list untouched when nothing is removed', function () {
    Block::make('Banner', 'banner')->restrictToPostTypes(['page']);

    expect(BlockTypeFilter::filterBlockTypes(['core/paragraph', 'meta-box/banner'], editorContext('page')))
        ->toBe(['core/paragraph', 'meta-box/banner']);
});
