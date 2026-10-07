# WordPress fields

The package provides a variety of fields specifically designed for WordPress, allowing you to interact with posts, taxonomies, users, and more. This document covers the WordPress-specific fields available in the package and how to use them.

## Post Field

The `Post` field is used to create fields that allow selecting posts. It uses the `Ajax` trait to provide additional configuration options for AJAX loading.

### Example

```php
<?php

use Pollora\Metabox\Fields\Post;

Post::make('Select Post', 'select_post')
    ->postType('post')
    ->queryArgs(['orderby' => 'date', 'order' => 'DESC'])
    ->setAsParent(true)
    ->fieldType('select');
```

### Methods

- **`postType(string|array $postType)`**: Sets the type of post to select.
- **`queryArgs(array $queryArgs)`**: Sets the arguments to pass to the WP_Query function.
- **`setAsParent(bool $parent)`**: Sets whether the field should allow selecting parent posts.
- **`addNew(bool $addNew = true)`**: Shows a button opening a form to create a new post. Meta Box only shows it for a single post type: with several post types, building the field throws a `LogicException`.
- **`toggleAllButton(bool $select_all_none = true)`**: Adds a button selecting or unselecting every option, for the `checkbox_list` field type or a multiple select.
- **`fieldType(EntityFieldType|string $fieldType)`**: Sets the type of field.

## Sidebar Field

The `Sidebar` field is used to create different types of sidebar input fields.

### Example

```php
<?php

use Pollora\Metabox\Fields\Sidebar;

Sidebar::make('Select Sidebar', 'select_sidebar')
    ->fieldType('select');
```

### Methods

- **`fieldType(SidebarFieldType|string $fieldType)`**: Sets the type of the field.

## Taxonomy Field

The `Taxonomy` field is used to create fields that allow selecting terms. It uses the `Ajax` trait to provide additional configuration options for AJAX loading.

### Example

```php
<?php

use Pollora\Metabox\Fields\Taxonomy;

Taxonomy::make('Select Category', 'select_category')
    ->taxonomies('category')
    ->queryArgs(['hide_empty' => false])
    ->addNew(true)
    ->removeDefault(true)
    ->fieldType('select');
```

### Methods

- **`taxonomies(string|array $taxonomies)`**: Sets the type of taxonomies to select.
- **`queryArgs(array $queryArgs)`**: Sets the arguments to pass to the WP_Term_Query function.
- **`addNew(bool $addNew = true)`**: Allows users to create a new term when submitting the post.
- **`removeDefault(bool $removeDefault = true)`**: Removes the default WordPress taxonomy meta box.
- **`toggleAllButton(bool $select_all_none = true)`**: Adds a button selecting or unselecting every term, for the `checkbox_list` field type or a multiple select.
- **`fieldType(EntityFieldType|string $fieldType)`**: Sets the type of field.

## TaxonomyAdvanced Field

The `TaxonomyAdvanced` field is an extension of the `Taxonomy` field, allowing for more advanced term selection.

### Example

```php
<?php

use Pollora\Metabox\Fields\TaxonomyAdvanced;

TaxonomyAdvanced::make('Select Advanced Category', 'select_advanced_category')
    ->taxonomies('category')
    ->queryArgs(['hide_empty' => false])
    ->addNew(true)
    ->removeDefault(true)
    ->fieldType('select');
```

### Methods

- Inherits all methods from the `Taxonomy` field.

## User Field

The `User` field is used to create fields that allow selecting users.

### Example

```php
<?php

use Pollora\Metabox\Fields\User;

User::make('Select User', 'select_user')
    ->queryArgs(['role' => 'editor'])
    ->fieldType('select');
```

### Example with AJAX search

On sites with many users, loading every option into the page is expensive. Enable
AJAX so Meta Box queries users on demand instead:

```php
<?php

use Pollora\Metabox\Fields\User;

User::make('Speakers', 'speaker_ids')
    ->queryArgs(['role' => 'subscriber'])
    ->fieldType('select_advanced')
    ->multiple()
    ->ajax()
    ->minimumInputLength(2)
    ->placeholder('Search for a user');
```

### Methods

- **`queryArgs(array $queryArgs)`**: Sets the arguments to pass to the WP_User_Query function.
- **`fieldType(EntityFieldType|string $fieldType)`**: Sets the type of field.
- **`displayField(string $displayField)`**: Sets the `WP_User` property used as the option label. Defaults to `display_name`.
- **`addNew(bool $addNew = true)`**: Shows a button opening a form to create a new user.
- **`toggleAllButton(bool $select_all_none = true)`**: Adds a button selecting or unselecting every user, for the `checkbox_list` field type or a multiple select.
- **`ajax(bool $ajax = true)`**: Enables AJAX search. Meta Box only supports it with `select_advanced`, so the default `select` field type is switched to `select_advanced`.
- **`minimumInputLength(int $length)`**: Sets how many characters must be typed before the AJAX search fires.

---

**Previous:** [HTML5 fields](html5-fields.md)  
**Next:** [Upload fields](upload-fields.md)
