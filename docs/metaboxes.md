# Meta boxes

The `Metabox` class provides a powerful and flexible way to create custom metaboxes in WordPress. This guide will walk you through the process of creating a metabox and adding fields to it.

## Basic Usage

To create a metabox, you need to use the `Metabox::make` method, which initializes a new metabox with a title and an ID. You can then chain methods to configure the metabox's properties and add fields.

### Example

```php
<?php

use Pollora\Metabox\Metabox;
use Pollora\Metabox\Fields\Text;
use Pollora\Metabox\Fields\Number;

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

Fields are added to a metabox using the `fields` method. The package supports a variety of field types, including text, number, textarea, and more. Each field type has its own set of methods for configuration.

### Field Types

- **Text**: A simple text input field.
- **Number**: A numeric input field with options for min, max, and step values.
- **Textarea**: A multi-line text input field.
- **SingleImage**: An image upload field.

### Example of Adding Fields

```php
<?php

use Pollora\Metabox\Fields\Textarea;
use Pollora\Metabox\Fields\SingleImage;

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

The `setting()` method allows you to add any Meta Box-specific option that isn't wrapped by a dedicated method. This is useful when you need to use Meta Box features that aren't yet wrapped by Metabox.

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

use Pollora\Metabox\Location;

Metabox::make('Custom Metabox', 'custom_metabox')
    ->location(Location::postTypes('page'))
    ->fields([
        Text::make('Page Title', 'page_title'),
    ]);
```

### Methods

- **`Location::postTypes(string|array $postTypes)`**: Shows the metabox on the given post types.
- **`Location::taxonomies(string|array $taxonomies)`**: Shows the metabox on terms of the given taxonomies (MB Term Meta).
- **`Location::settingsPages(string|array $settingsPages)`**: Shows the metabox on the given settings pages (MB Settings Page).
- **`Location::user()`**: Shows the metabox on user profiles (MB User Meta).
- **`Location::comment()`**: Shows the metabox on comments (MB Comment Meta).
- **`andWhere(string $type, string|array $values)`**: Adds another condition, e.g. `Location::settingsPages('options')->andWhere('tab', 'general')`.
- **`Location::where(string $type, string|array $values)`**: Creates a condition with any Meta Box key. Note that Meta Box expects `post_types`, not `post_type`.
- **`Location::default()`**: The location used when none is set: posts.

---

**Previous:** [Overview](../README.md)  
**Next:** [Common field settings](common-settings.md)
