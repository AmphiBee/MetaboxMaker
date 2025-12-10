<?php

use AmphiBee\MetaboxMaker\Fields\File;
use AmphiBee\MetaboxMaker\Fields\FileAdvanced;
use AmphiBee\MetaboxMaker\Fields\FileInput;
use AmphiBee\MetaboxMaker\Fields\FileUpload;

test('can configure file field with specific settings', function () {
    $uniqueFilenameCallback = fn ($dir, $name) => $dir.'/custom_'.$name;

    $args = File::make('Upload Field', 'upload_field')
        ->maxFileUploads(5)
        ->forceDelete(true)
        ->uploadDir('/custom/uploads')
        ->uniqueFilenameCallback($uniqueFilenameCallback)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'file',
        'name' => 'Upload Field',
        'id' => 'upload_field',
        'max_file_uploads' => 5,
        'force_delete' => true,
        'upload_dir' => '/custom/uploads',
        'unique_filename_callback' => $uniqueFilenameCallback,
    ]);
});

test('can configure file advanced field with specific settings', function () {
    $args = FileAdvanced::make('Advanced Upload Field', 'advanced_upload_field')
        ->maxFileUploads(10)
        ->forceDelete(false)
        ->mimeType('application/pdf')
        ->showMaxStatus(true)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'file_advanced',
        'name' => 'Advanced Upload Field',
        'id' => 'advanced_upload_field',
        'max_file_uploads' => 10,
        'force_delete' => false,
        'mime_type' => 'application/pdf',
        'max_status' => true,
    ]);
});

test('can configure file upload field with specific settings', function () {
    $args = FileUpload::make('File Upload Field', 'file_upload_field')
        ->maxFileUploads(10)
        ->forceDelete(false)
        ->maxFileSize('20gb')
        ->mimeType('application/pdf')
        ->showMaxStatus(true)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'file_upload',
        'name' => 'File Upload Field',
        'id' => 'file_upload_field',
        'max_file_uploads' => 10,
        'max_file_size' => '20gb',
        'force_delete' => false,
        'mime_type' => 'application/pdf',
        'max_status' => true,
    ]);
});

test('can configure simple file input with specific settings', function () {
    $args = FileInput::make('Upload Field', 'upload_field')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'file_input',
        'name' => 'Upload Field',
        'id' => 'upload_field',
    ]);
});
