# WordPress Fields in MetaboxMaker

MetaboxMaker provides a variety of fields specifically designed for WordPress, allowing you to interact with posts, taxonomies, users, and more. This document covers the WordPress-specific fields available in the package and how to use them.

## Post Field

The `Post` field is used to create fields that allow selecting posts. It uses the `Ajax` trait to provide additional configuration options for AJAX loading.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Post;

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
- **`fieldType(EntityFieldType|string $fieldType)`**: Sets the type of field.

## Sidebar Field

The `Sidebar` field is used to create different types of sidebar input fields.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Sidebar;

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

use AmphiBee\MetaboxMaker\Fields\Taxonomy;

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
- **`fieldType(EntityFieldType|string $fieldType)`**: Sets the type of field.

## TaxonomyAdvanced Field

The `TaxonomyAdvanced` field is an extension of the `Taxonomy` field, allowing for more advanced term selection.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\TaxonomyAdvanced;

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

use AmphiBee\MetaboxMaker\Fields\User;

User::make('Select User', 'select_user')
    ->queryArgs(['role' => 'editor'])
    ->fieldType('select');
```

### Methods

- **`queryArgs(array $queryArgs)`**: Sets the arguments to pass to the WP_User_Query function.
- **`fieldType(EntityFieldType|string $fieldType)`**: Sets the type of field.

---

**Previous :** [HTML5 Fields](Html5.md)  
**Next :** [Upload Fields](Upload.md) 