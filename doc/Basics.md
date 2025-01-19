# Basic Fields in MetaboxMaker

MetaboxMaker provides a variety of basic fields that can be used to create custom metaboxes and blocks in WordPress. This document covers the basic fields available in the package and how to use them.

## Text Field

The `Text` field is used to create a simple text input field.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Text;

Text::make('Username', 'username')
    ->placeholder('Enter your username')
    ->size(30)
    ->prepend('@')
    ->append('.com');
```

### Methods

- **`placeholder(string $text)`**: Sets the placeholder text for the input field.
- **`size(int $size)`**: Sets the size of the input field.
- **`prepend(string $text)`**: Sets the text to prepend to the input field.
- **`append(string $text)`**: Sets the text to append to the input field.
- **`datalist(string $id, array $options)`**: Sets the datalist options for the input field.

## Textarea Field

The `Textarea` field is used to create a multi-line text input field.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Textarea;

Textarea::make('Description', 'description')
    ->rows(5)
    ->cols(60);
```

### Methods

- **`rows(int $rows)`**: Sets the number of rows for the textarea.
- **`cols(int $cols)`**: Sets the number of columns for the textarea.

## Select Field

The `Select` field is used to create a dropdown select field.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Select;

Select::make('Country', 'country')
    ->options([
        'us' => 'United States',
        'ca' => 'Canada',
        'uk' => 'United Kingdom',
    ])
    ->flatten();
```

### Methods

- **`options(array $options)`**: Sets the options for the select field.
- **`flatten(bool $flatten = true)`**: Sets whether to display sub-items without indentation.

## Checkbox Field

The `Checkbox` field is used to create a checkbox input field.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Checkbox;

Checkbox::make('Subscribe', 'subscribe')
    ->checkedByDefault();
```

### Methods

- **`checkedByDefault(bool $std = true)`**: Sets whether the checkbox is checked by default.

## CheckboxList Field

The `CheckboxList` field is used to create a list of checkboxes.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\CheckboxList;

CheckboxList::make('Interests', 'interests')
    ->options([
        'sports' => 'Sports',
        'music' => 'Music',
        'movies' => 'Movies',
    ])
    ->toggleAll();
```

### Methods

- **`options(array $options)`**: Sets the options for the checkbox list.
- **`toggleAll()`**: Adds a toggle all option to the checkbox list.

## Radio Field

The `Radio` field is used to create a set of radio button input fields.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Radio;

Radio::make('Gender', 'gender')
    ->options([
        'male' => 'Male',
        'female' => 'Female',
    ])
    ->inline();
```

### Methods

- **`options(array $options)`**: Sets the options for the radio field.
- **`inline()`**: Sets whether the radio buttons should be displayed inline.

---

**Previous :** [Metabox](Metabox.md)  
**Next :** [Advanced Fields](Advanced.md)