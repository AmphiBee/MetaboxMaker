<?php

use AmphiBee\MetaboxMaker\Enums\EntityFieldType;
use AmphiBee\MetaboxMaker\Fields\Taxonomy;
use AmphiBee\MetaboxMaker\Fields\TaxonomyAdvanced;

test('can add taxonomy field with specific query args and taxonomy type', function () {
    $args = Taxonomy::make('Taxonomy Field', 'taxonomy_field')
        ->taxonomies(['post_tag', 'gender'])
        ->queryArgs(['hide_empty' => true, 'parent' => 0])
        ->addNew()
        ->ajax()
        ->fieldType(EntityFieldType::CHECKBOX_TREE)
        ->placeholder('Select a term')
        ->minimumInputLength(1)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'taxonomy',
        'name' => 'Taxonomy Field',
        'id' => 'taxonomy_field',
        'taxonomies' => ['post_tag', 'gender'],
        'query_args' => ['hide_empty' => true, 'parent' => 0],
        'add_new' => true,
        'ajax' => true,
        'field_type' => 'checkbox_tree',
        'placeholder' => 'Select a term',
        'js_options' => [
            'minimumInputLength' => 1,
        ],
    ]);
});

test('can add advanced taxonomy field with specific query args and taxonomy type', function () {
    $args = TaxonomyAdvanced::make('Taxonomy Field', 'taxonomy_field')
        ->taxonomies(['post_tag', 'gender'])
        ->queryArgs(['hide_empty' => true, 'parent' => 0])
        ->addNew()
        ->ajax()
        ->fieldType(EntityFieldType::CHECKBOX_TREE)
        ->placeholder('Select a term')
        ->minimumInputLength(1)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'taxonomy_advanced',
        'name' => 'Taxonomy Field',
        'id' => 'taxonomy_field',
        'taxonomies' => ['post_tag', 'gender'],
        'query_args' => ['hide_empty' => true, 'parent' => 0],
        'add_new' => true,
        'ajax' => true,
        'field_type' => 'checkbox_tree',
        'placeholder' => 'Select a term',
        'js_options' => [
            'minimumInputLength' => 1,
        ],
    ]);
});
