<?php

declare(strict_types=1);

use Pollora\Metabox\Enums\AdminColumnLink;
use Pollora\Metabox\Enums\Context;
use Pollora\Metabox\Relationship;
use Pollora\Metabox\Relationships\Side;

afterEach(function () {
    unset($GLOBALS['test_did_actions'], $GLOBALS['test_doing_actions'], $GLOBALS['test_actions']);
});

test('builds the simplest relationship', function () {
    expect(Relationship::make('posts_to_pages')->from(Side::posts())->to(Side::posts('page'))->build())->toBe([
        'id' => 'posts_to_pages',
        'from' => ['object_type' => 'post', 'post_type' => 'post'],
        'to' => ['object_type' => 'post', 'post_type' => 'page'],
    ]);
});

test('registers on mb_relationships_init', function () {
    Relationship::make('registered')->from(Side::posts())->to(Side::users());

    expect($GLOBALS['test_actions']['mb_relationships_init'])->toBe([10]);
});

test('registers last while mb_relationships_init runs', function () {
    $GLOBALS['test_did_actions'] = $GLOBALS['test_doing_actions'] = ['mb_relationships_init'];

    Relationship::make('registered_late')->from(Side::posts())->to(Side::users());

    expect($GLOBALS['test_actions']['mb_relationships_init'])->toBe([PHP_INT_MAX]);
});

test('rejects a relationship declared after mb_relationships_init', function () {
    $GLOBALS['test_did_actions'] = ['mb_relationships_init'];

    expect(fn () => Relationship::make('too_late'))->toThrow(LogicException::class);
});

test('rejects a duplicate ID', function () {
    Relationship::make('duplicate');

    expect(fn () => Relationship::make('duplicate'))->toThrow(LogicException::class);
});

test('sets terms and users sides', function () {
    $relationship = Relationship::make('products_to_brands')
        ->from(Side::posts('product')->hasOne())
        ->to(Side::terms('brand'))
        ->build();

    expect($relationship['from'])->toBe(['object_type' => 'post', 'post_type' => 'product', 'has_one_relationship' => true])
        ->and($relationship['to'])->toBe(['object_type' => 'term', 'taxonomy' => 'brand'])
        ->and(Relationship::make('users_to_posts')->from(Side::users())->to(Side::posts())->build()['from'])->toBe(['object_type' => 'user']);
});

test('takes the field settings from the side displaying the field', function () {
    $relationship = Relationship::make('events_to_speakers')
        ->from(Side::posts('event')
            ->metaBox(title: 'Speakers', context: Context::Normal, priority: 'high', closed: true)
            ->field(label: 'Speakers', placeholder: 'Select speakers', max: 10, queryArgs: ['orderby' => 'title'])
            ->adminColumn(after: 'title', link: AdminColumnLink::Edit))
        ->to(Side::posts('speaker')->metaBox(title: 'Events', hidden: true)->adminColumn())
        ->build();

    expect($relationship['from'])->toBe([
        'object_type' => 'post',
        'post_type' => 'event',
        'meta_box' => ['title' => 'Speakers', 'context' => 'normal', 'priority' => 'high', 'closed' => true],
        'admin_column' => ['position' => 'after title', 'link' => 'edit'],
    ])->and($relationship['to'])->toBe([
        'object_type' => 'post',
        'post_type' => 'speaker',
        'meta_box' => ['title' => 'Events', 'hidden' => true],
        'field' => ['name' => 'Speakers', 'placeholder' => 'Select speakers', 'max_clone' => 10, 'query_args' => ['orderby' => 'title']],
        'admin_column' => true,
    ]);
});

test('admin column links can be disabled', function () {
    expect(Relationship::make('no_link')->from(Side::posts()->adminColumn(link: false))->to(Side::users())->build()['from']['admin_column'])
        ->toBe(['link' => false]);
});

test('validates the side settings', function () {
    expect(fn () => Side::posts()->metaBox(context: 'middle'))->toThrow(InvalidArgumentException::class)
        ->and(fn () => Side::posts()->field(max: 0))->toThrow(InvalidArgumentException::class)
        ->and(fn () => Side::posts()->adminColumn(before: 'title', after: 'date'))->toThrow(InvalidArgumentException::class)
        ->and(fn () => Side::posts()->adminColumn(link: 'preview'))->toThrow(InvalidArgumentException::class);
});

test('builds a reciprocal relationship from the from side', function () {
    $relationship = Relationship::make('related_posts')
        ->from(Side::posts()->metaBox(title: 'Related posts')->field(max: 3))
        ->to(Side::posts())
        ->reciprocal()
        ->build();

    expect($relationship['reciprocal'])->toBeTrue()
        ->and($relationship['to']['field'])->toBe(['max_clone' => 3]);
});

test('rejects invalid relationships', function () {
    expect(fn () => Relationship::make('no_to')->from(Side::posts())->build())->toThrow(LogicException::class)
        ->and(fn () => Relationship::make('mixed')->from(Side::posts())->to(Side::posts('page'))->reciprocal()->build())->toThrow(LogicException::class)
        ->and(fn () => Relationship::make('to_display')->from(Side::posts())->to(Side::posts()->metaBox(title: 'X'))->reciprocal()->build())->toThrow(LogicException::class);
});
