<?php

declare(strict_types=1);

use Pollora\Metabox\Enums\SettingsPageStyle;
use Pollora\Metabox\Enums\SwitchStyle;
use Pollora\Metabox\Fields\File;
use Pollora\Metabox\Fields\FileUpload;
use Pollora\Metabox\Fields\GoogleMap;
use Pollora\Metabox\Fields\Icon;
use Pollora\Metabox\Fields\Image;
use Pollora\Metabox\Fields\OpenStreetMap;
use Pollora\Metabox\Fields\Switcher;
use Pollora\Metabox\Fields\Text;
use Pollora\Metabox\SettingsPage;

test('switch style is validated', function () {
    expect(Switcher::make('On', 'on')->style(SwitchStyle::Square)->build())->toHaveKey('style', 'square');

    Switcher::make('On', 'on')->style('round');
})->throws(InvalidArgumentException::class);

test('settings page style is validated', function () {
    expect(SettingsPage::make('Options', 'options')->style(SettingsPageStyle::NoBoxes)->build())->toHaveKey('style', 'no-boxes');

    SettingsPage::make('Options', 'options')->style('flat');
})->throws(InvalidArgumentException::class);

test('maps marker can be locked', function (string $class) {
    expect($class::make('Map', 'map')->markerDraggable(false)->build())->toHaveKey('marker_draggable', false);
})->with([GoogleMap::class, OpenStreetMap::class]);

test('icon base class', function () {
    expect(Icon::make('Icon', 'icon')->iconBaseClass('fa')->build())->toHaveKey('icon_base_class', 'fa');
});

test('clone empty start', function () {
    expect(Text::make('Links', 'links')->cloneable()->cloneEmptyStart()->build())
        ->toMatchArray(['clone' => true, 'clone_empty_start' => true]);
});

test('max file size accepts bytes or a unit', function () {
    expect(FileUpload::make('Files', 'files')->maxFileSize(1048576)->build())->toHaveKey('max_file_size', 1048576)
        ->and(FileUpload::make('Files', 'files')->maxFileSize('10mb')->build())->toHaveKey('max_file_size', '10mb');
});

test('classic upload fields support mime types and image sizes', function () {
    expect(File::make('Contract', 'contract')->mimeType('application/pdf')->build())->toHaveKey('mime_type', 'application/pdf')
        ->and(Image::make('Logo', 'logo')->imageSize('thumbnail')->build())->toHaveKey('image_size', 'thumbnail');
});
