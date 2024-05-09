<?php

use AmphiBee\MetaboxMaker\Fields\Post;

test('can add post field with specific query args and post type', function () {
    $args = Post::make('Post Field', 'post_field')
        ->postType(['post', 'page'])  // Accepte des types de post multiples
        ->queryArgs(['orderby' => 'title', 'order' => 'ASC'])
        ->setAsParent(true)
        ->ajax()
        ->fieldType('select_advanced')
        ->placeholder('Select a post')
        ->minimumInputLength(20)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'post',
        'name' => 'Post Field',
        'id' => 'post_field',
        'post_type' => ['post', 'page'],
        'query_args' => ['orderby' => 'title', 'order' => 'ASC'],
        'parent' => true,
        'ajax' => true,
        'field_type' => 'select_advanced',
        'placeholder' => 'Select a post',
        'js_options' => [
            'minimumInputLength' => 20,
        ],
    ]);
});
