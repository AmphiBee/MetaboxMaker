# MetaboxMaker

MetaboxMaker is a powerful and flexible WordPress package designed to simplify the creation and management of custom metaboxes and fields. It provides developers with an object-oriented interface to generate various types of fields quickly and integrate them seamlessly into WordPress themes or plugins.

## Features

- **Object-Oriented Approach**: Leverages modern PHP practices to offer a clean and maintainable codebase.
- **Extensible Field Types**: Includes a variety of field types such as text, number, file, image, video, and more.
- **Customizable Options**: Each field type comes with configurable settings to suit different requirements.
- **Easy Integration**: Easily integrates with existing WordPress setups, enhancing custom content types with minimal effort.
- **Advanced Field Configurations**: Supports advanced features like force deletion, custom upload directories, and unique filename callbacks.

## Installation

To install MetaboxMaker, you can install the composer package into your WordPress plugin or theme directory.

```bash
composer require amphibee/metabox-maker
```

## Usage

### Basic Usage

Here is a quick example of how to create a custom metabox with text and number fields:

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Fields\Number;

// Create a new text field
$textField = Text::make('Username', 'username')
                ->placeholder('Enter your username');

// Create a new number field
$numberField = Number::make('Age', 'age')
                ->min(18)
                ->max(100)
                ->step(1);

// Add fields to your metabox and display it in the post editor
Metabox::make('User Information', [$textField, $numberField])
       ->context('side')
       ->priority('high');

// Full Example
use AmphiBee\MetaboxMaker\Fields\Group;
use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Metabox;
use AmphiBee\MetaboxMaker\Location;

Metabox::make('Test Fieldset', 'test_fieldset')
        ->fields([
            Text::make('Main Text', 'main_text')
                ->placeholder('Enter main text'),
            Group::make('Sub group', 'sub_group')
                ->fields([
                    Text::make('Sub Text', 'sub_text')
                        ->placeholder('Enter sub text'),
                ]),
        ])
        ->priority('high')
        ->context('side')
        ->location(Location::where('post_type', ['post', 'page']));
```

### Advanced Features

You can also utilize advanced features such as image upload fields with custom settings:

```php
<?php

use AmphiBee\MetaboxMaker\Fields\ImageUpload;

$imageField = ImageUpload::make('Profile Picture', 'profile_picture')
                ->maxFileSize('5mb')
                ->imageSize('medium')
                ->forceDelete(true);

Metabox::make('Profile', [$imageField])
       ->context('normal')
       ->priority('default');
```

## Contributing

Contributions are welcome! Please feel free to submit pull requests or create issues for bugs and feature requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
