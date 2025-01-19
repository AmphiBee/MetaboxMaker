# Layout Fields in MetaboxMaker

MetaboxMaker provides a variety of fields specifically designed for layout purposes, allowing you to organize and structure your metaboxes and blocks in WordPress. This document covers the layout-specific fields available in the package and how to use them.

## Divider Field

The `Divider` field is used to create visual separators in the UI. It helps in organizing fields into sections.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Divider;

Divider::make();
```

### Methods

- This field does not have additional methods beyond those inherited from the `Field` class.

## Group Field

The `Group` field is used to create a group of fields, allowing for nested field structures.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Group;
use AmphiBee\MetaboxMaker\Fields\Text;

Group::make('Group Name', 'group_name')
    ->fields([
        Text::make('Text Field', 'text_field'),
        Divider::make(),
    ]);
```

### Methods

- **`fields(array $fields)`**: Adds fields to the group, which can include nested groups.

## Heading Field

The `Heading` field is used to create section headings in the UI. It can include an optional description.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Heading;

Heading::make('Section Title')
    ->description('This is a section description.');
```

### Methods

- **`description(string $desc)`**: Sets the description for the heading.

## Tab Field

The `Tab` field is used to create tabbed sections in the UI, allowing for better organization of fields.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Tab;
use AmphiBee\MetaboxMaker\Fields\Text;

Tab::make('Tab Title')
    ->icon('dashicons-admin-generic')
    ->fields([
        Text::make('Text Field', 'text_field'),
    ]);
```

### Methods

- **`icon(string $icon)`**: Sets the icon for the tab.
- **`fields(array $fields)`**: Adds fields to the tab, which can include nested groups.

---

**Previous :** [Upload Fields](Upload.md)  
**Next :** [Block](Block.md) 