<?php

declare(strict_types=1);

use AmphiBee\MetaboxMaker\Location;

test('typed constructors emit the keys expected by Meta Box', function () {
    expect(Location::postTypes('page')->get())->toBe(['post_types' => ['page']])
        ->and(Location::postTypes(['post', 'page'])->get())->toBe(['post_types' => ['post', 'page']])
        ->and(Location::taxonomies('category')->get())->toBe(['taxonomies' => ['category']])
        ->and(Location::settingsPages('options')->get())->toBe(['settings_pages' => ['options']])
        ->and(Location::user()->get())->toBe(['type' => 'user'])
        ->and(Location::comment()->get())->toBe(['type' => 'comment']);
});

test('conditions can be combined', function () {
    expect(Location::settingsPages('options')->andWhere('tab', 'general')->get())
        ->toBe(['settings_pages' => ['options'], 'tab' => 'general']);
});

test('where() still accepts any key', function () {
    expect(Location::where('post_types', 'page')->get())->toBe(['post_types' => 'page']);
});
