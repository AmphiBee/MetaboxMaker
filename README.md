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

// Add fields to your metabox and display it in the post editor
Metabox::make('User Information', 'user_info')
       ->fields([
           Text::make('Username', 'username')
                ->placeholder('Enter your username'),
           Number::make('Age', 'age')
                ->min(18)
                ->max(100)
                ->step(1)
       ])
       ->context('side')
       ->priority('high');
```

### Creating Gutenberg Blocks

You can also create custom Gutenberg blocks using the `Block` class:

```php
<?php

use AmphiBee\MetaboxMaker\Block;
use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Fields\Wysiwyg;
use AmphiBee\MetaboxMaker\Fields\Group;

Block::make('Example Block', 'example-block')
    ->description('An example Gutenberg block')
    ->icon('book-alt')
    ->category('layout')
    ->renderCallback(function ($attributes) {
        echo '<div>' . $attributes['content'] . '</div>';
    })
    ->fields([
        Text::make('Title', 'title'),
        Wysiwyg::make('Content', 'content'),
        Group::make('Links', 'links')
            ->cloneable()
            ->addButton('Add a link')
            ->maxClone(3)
            ->fields([
                Text::make('Link', 'link'),
                Text::make('Label', 'label'),
            ]),
    ]);
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

## Documentation

To get started with MetaboxMaker and explore all its features, please refer to our [Getting Started guide](doc/GettingStarted.md). This document will provide you with all the necessary information to integrate and effectively use MetaboxMaker in your WordPress projects.

## Contributing

Contributions are welcome! Please feel free to submit pull requests or create issues for bugs and feature requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.
