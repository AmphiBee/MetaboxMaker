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
Metabox::create('User Information', [$textField, $numberField])
       ->context('side')
       ->priority('high')
       ->register();
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

Metabox::create('Profile', [$imageField])
       ->context('normal')
       ->priority('default')
       ->register();
```

## Contributing

Contributions are welcome! Please feel free to submit pull requests or create issues for bugs and feature requests.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE) file for details.
```

### Customization

You should replace the URL in the `git clone` command with the actual URL of your repository, and adjust the examples to better fit the actual capabilities of your package. If your package has additional setup instructions or dependencies, those should be included in the Installation section. 

This `README.md` provides a comprehensive yet concise introduction to your package, making it accessible to other developers and encouraging its use and contribution.
