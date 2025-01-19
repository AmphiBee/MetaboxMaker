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