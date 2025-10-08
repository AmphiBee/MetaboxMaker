# Creating a Metabox with MetaboxMaker

The `Metabox` class in MetaboxMaker provides a powerful and flexible way to create custom metaboxes in WordPress. This guide will walk you through the process of creating a metabox and adding fields to it.

## Basic Usage

To create a metabox, you need to use the `Metabox::make` method, which initializes a new metabox with a title and an ID. You can then chain methods to configure the metabox's properties and add fields.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Metabox;
use AmphiBee\MetaboxMaker\Fields\Text;
use AmphiBee\MetaboxMaker\Fields\Number;

Metabox::make('User Information', 'user_info')
    ->description('A metabox for user information')
    ->context('normal')
    ->priority('high')
    ->fields([
        Text::make('Username', 'username')
            ->placeholder('Enter your username'),
        Number::make('Age', 'age')
            ->min(18)
            ->max(100)
            ->step(1),
    ]);
```

### Methods

- **`description(string $description)`**: Sets the description of the metabox.
- **`context(string $context)`**: Sets the context where the metabox should appear. Options include `normal`, `side`, and `advanced`.
- **`priority(string $priority)`**: Sets the priority of the metabox. Options include `high`, `core`, `default`, and `low`.
- **`fields(array $fields)`**: Adds fields to the metabox. Accepts an array of field instances.
- **`setting(string $key, mixed $value)`**: Adds a custom Meta Box setting that isn't explicitly defined. This allows you to pass any Meta Box-specific option directly.

## Adding Fields

Fields are added to a metabox using the `fields` method. MetaboxMaker supports a variety of field types, including text, number, textarea, and more. Each field type has its own set of methods for configuration.

### Field Types

- **Text**: A simple text input field.
- **Number**: A numeric input field with options for min, max, and step values.
- **Textarea**: A multi-line text input field.
- **SingleImage**: An image upload field.

### Example of Adding Fields

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Textarea;
use AmphiBee\MetaboxMaker\Fields\SingleImage;

Metabox::make('Post Details', 'post_details')
    ->fields([
        Textarea::make('Description', 'description')
            ->rows(5)
            ->placeholder('Enter a description'),
        SingleImage::make('Featured Image', 'featured_image')
            ->maxFileSize('2mb')
            ->imageSize('large'),
    ]);
```

## Custom Settings

The `setting()` method allows you to add any Meta Box-specific option that isn't explicitly provided by MetaboxMaker. This is useful when you need to use Meta Box features that aren't yet wrapped by MetaboxMaker.

### Example with Custom Settings

```php
<?php

Metabox::make('Advanced Metabox', 'advanced_metabox')
    ->setting('autosave', true)
    ->setting('validation', [
        'rules' => [
            'field_id' => [
                'required' => true,
                'minlength' => 5
            ]
        ]
    ])
    ->setting('class', 'custom-metabox-class')
    ->fields([
        Text::make('Custom Field', 'custom_field')
            ->setting('custom_attribute', 'custom_value'),
    ]);
```

Note that custom settings also work on individual fields:

```php
Text::make('Email', 'email')
    ->setting('pattern', '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$')
    ->setting('custom_validation', true);
```

## Setting the Location

The `Location` class allows you to define where the metabox should appear based on specific conditions. You can use the `Location::where` method to specify these conditions.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Location;

Metabox::make('Custom Metabox', 'custom_metabox')
    ->location(Location::where('post_type', 'page'))
    ->fields([
        Text::make('Page Title', 'page_title'),
    ]);
```

### Methods

- **`Location::where(string $type, string|array $values)`**: Creates a new location condition based on the type and values provided.
- **`Location::default()`**: Sets the default location condition, typically for posts.

---

**Previous :** [Getting Started](GettingStarted.md)  
**Next :** [Basics](Basics.md)