<?php

use AmphiBee\MetaboxMaker\Fields\Image;
use AmphiBee\MetaboxMaker\Fields\ImageAdvanced;
use AmphiBee\MetaboxMaker\Fields\ImageUpload;
use AmphiBee\MetaboxMaker\Fields\SingleImage;

test('can configure image field with specific settings', function () {
    $uniqueFilenameCallback = fn ($dir, $name) => $dir.'/custom_'.$name;

    $args = Image::make('Image Field', 'image_field')
        ->maxFileUploads(5)
        ->forceDelete()
        ->uploadDir('/custom/uploads')
        ->uniqueFilenameCallback($uniqueFilenameCallback)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'image',
        'name' => 'Image Field',
        'id' => 'image_field',
        'max_file_uploads' => 5,
        'force_delete' => true,
        'upload_dir' => '/custom/uploads',
        'unique_filename_callback' => $uniqueFilenameCallback,
    ]);
});

test('can configure image advanced field with specific settings', function () {
    $args = ImageAdvanced::make('Advanced Image Field', 'advanced_image_field')
        ->maxFileUploads(10)
        ->forceDelete(true)
        ->uploadDir('/custom/uploads')
        ->uniqueFilenameCallback(fn ($file) => 'unique_'.$file)
        ->showMaxStatus(true)
        ->imageSize('medium')
        ->newImagePlacement('beginning')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'image_advanced',
        'name' => 'Advanced Image Field',
        'id' => 'advanced_image_field',
        'max_file_uploads' => 10,
        'force_delete' => true,
        'upload_dir' => '/custom/uploads',
        'unique_filename_callback' => fn ($file) => 'unique_'.$file,
        'max_status' => true,
        'image_size' => 'medium',
        'add_to' => 'beginning',
    ]);
});

test('can configure single image field with specific settings', function () {
    $args = SingleImage::make('Profile Picture', 'profile_picture')
        ->forceDelete(false)
        ->imageSize('medium')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'single_image',
        'name' => 'Profile Picture',
        'id' => 'profile_picture',
        'force_delete' => false,
        'image_size' => 'medium',
    ]);
});

test('can configure image upload field with specific settings', function () {
    $args = ImageUpload::make('Gallery', 'gallery')
        ->maxFileUploads(5)
        ->forceDelete(true)
        ->showMaxStatus(true)
        ->imageSize('medium')
        ->newImagePlacement('beginning')
        ->maxFileSize('2mb')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'image_upload',
        'name' => 'Gallery',
        'id' => 'gallery',
        'max_file_uploads' => 5,
        'force_delete' => true,
        'max_status' => true,
        'image_size' => 'medium',
        'add_to' => 'beginning',
        'max_file_size' => '2mb',
    ]);
});
