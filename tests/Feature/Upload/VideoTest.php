<?php

use AmphiBee\MetaboxMaker\Fields\Video;

test('can configure video field with specific settings', function () {
    $args = Video::make('Feature Video', 'feature_video')
        ->maxFileUploads(3)
        ->forceDelete(false)
        ->showMaxStatus(true)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'video',
        'name' => 'Feature Video',
        'id' => 'feature_video',
        'max_file_uploads' => 3,
        'force_delete' => false,
        'max_status' => true,
    ]);
});
