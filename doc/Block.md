# Creating a Block with MetaboxMaker

The `Block` class in MetaboxMaker extends the `Metabox` class to provide a streamlined way to create custom Gutenberg blocks in WordPress. This guide will walk you through the process of creating a block and adding fields to it.

## Basic Usage

To create a block, you need to use the `Block::make` method, which initializes a new block with a title and an ID. You can then chain methods to configure the block's properties and add fields.

### Example

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

### Methods

- **`description(string $description)`**: Sets the description of the block.
- **`icon(string|array $icon)`**: Sets the icon for the block. Can be a Dashicon, FontAwesome icon, or custom SVG.
- **`category(string $category)`**: Sets the category of the block. Options include `text`, `media`, `design`, `widgets`, `theme`, and `embed`.
- **`renderCallback(callable $callback)`**: Sets the callback function to render the block.
- **`fields(array $fields)`**: Adds fields to the block. Accepts an array of field instances.

## Adding Fields

Fields are added to a block using the `fields` method. MetaboxMaker supports a variety of field types, including text, wysiwyg, group, and more. Each field type has its own set of methods for configuration.

### Field Types

- **Text**: A simple text input field.
- **Wysiwyg**: A rich text editor field.
- **Group**: A repeatable group of fields.
- **SingleImage**: An image upload field.

### Example of Adding Fields

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Textarea;
use AmphiBee\MetaboxMaker\Fields\SingleImage;

Block::make('Post Details', 'post_details')
    ->fields([
        Textarea::make('Description', 'description')
            ->rows(5)
            ->placeholder('Enter a description'),
        SingleImage::make('Featured Image', 'featured_image')
            ->maxFileSize('2mb')
            ->imageSize('large'),
    ]);
```

---

**Previous :** [Layout Fields](Layout.md)