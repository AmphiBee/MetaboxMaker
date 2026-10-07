<?php

declare(strict_types=1);

use Pollora\Metabox\Enums\MediaPlacement;
use Pollora\Metabox\Fields\File;
use Pollora\Metabox\Fields\FileAdvanced;
use Pollora\Metabox\Fields\FileUpload;
use Pollora\Metabox\Fields\Image;
use Pollora\Metabox\Fields\ImageAdvanced;
use Pollora\Metabox\Fields\ImageUpload;
use Pollora\Metabox\Fields\SingleImage;
use Pollora\Metabox\Fields\Video;

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
        ->showMaxStatus(true)
        ->imageSize('medium')
        ->addTo(MediaPlacement::Beginning)
        ->build();

    expect($args)->toMatchArray([
        'type' => 'image_advanced',
        'name' => 'Advanced Image Field',
        'id' => 'advanced_image_field',
        'max_file_uploads' => 10,
        'force_delete' => true,
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
        ->addTo('beginning')
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

test('media library fields share the media settings', function (string $class) {
    expect($class::make('Media', 'media')
        ->maxFileUploads(3)
        ->mimeType('image/jpeg')
        ->addTo('end')
        ->build())->toMatchArray(['max_file_uploads' => 3, 'mime_type' => 'image/jpeg', 'add_to' => 'end']);
})->with([FileAdvanced::class, FileUpload::class, ImageAdvanced::class, ImageUpload::class, SingleImage::class, Video::class]);

test('upload directory settings are only on classic file fields', function () {
    expect(method_exists(File::class, 'uploadDir'))->toBeTrue()
        ->and(method_exists(Image::class, 'uploadDir'))->toBeTrue()
        ->and(method_exists(ImageAdvanced::class, 'uploadDir'))->toBeFalse()
        ->and(method_exists(SingleImage::class, 'uploadDir'))->toBeFalse();
});

test('media placement is validated', function () {
    ImageAdvanced::make('Gallery', 'gallery')->addTo('middle');
})->throws(InvalidArgumentException::class);
