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
- **`setting(string $key, mixed $value)`**: Adds a custom Meta Box setting that isn't explicitly defined. This allows you to pass any Meta Box-specific option directly.

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

## Restricting Blocks by Post Type

MetaboxMaker allows you to restrict the availability of blocks based on post types, making it easy to control which blocks can be used in different content types.

### Methods

- **`restrictToPostTypes(array $postTypes)`**: Restricts the block to be used only with the specified post types.
- **`excludePostTypes(array $postTypes)`**: Prevents the block from being used with the specified post types.

### Examples

#### Restricting a Block to Specific Post Types:

```php
<?php

Block::make('My Block', 'my-block')
    ->restrictToPostTypes(['page', 'product'])
    ->fields([
        // field definitions
    ]);
```

In this example, "My Block" will only be available for "page" and "product" post types.

#### Excluding a Block from Specific Post Types:

```php
<?php

Block::make('Blog Summary', 'summary-post')
    ->excludePostTypes(['post'])
    ->fields([
        // field definitions
    ]);
```

In this example, the "Blog Summary" block will be available for all post types except for "post".

### How It Works

This functionality uses the WordPress `allowed_block_types_all` filter to control which blocks are available in the editor based on the current post type.

The `BlockTypeFilter` service manages these restrictions efficiently, respecting the constraints defined for each block.

### Important Notes

- If you use both `restrictToPostTypes()` and `excludePostTypes()` on the same block, both restrictions will be applied.
- These methods only affect the visibility of blocks in the editor interface, not blocks that have already been inserted into existing content.

## Custom Settings

Just like with metaboxes, the `setting()` method allows you to add any Meta Box-specific option that isn't explicitly provided by MetaboxMaker. This is particularly useful for block-specific settings.

### Example with Custom Settings

```php
<?php

Block::make('Advanced Block', 'advanced-block')
    ->setting('supports', [
        'align' => ['wide', 'full'],
        'html' => false,
        'multiple' => true,
    ])
    ->setting('example', [
        'attributes' => [
            'title' => 'Example Title',
            'content' => 'Example content...'
        ]
    ])
    ->setting('keywords', ['custom', 'advanced', 'block'])
    ->fields([
        Text::make('Title', 'title')
            ->setting('save_field', false),
        Wysiwyg::make('Content', 'content')
            ->setting('autoresize', true),
    ]);
```

The custom settings work on both the block itself and individual fields within the block.

---

**Previous :** [Layout Fields](Layout.md)