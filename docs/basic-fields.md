# Basic fields

The package provides a variety of basic fields that can be used to create custom metaboxes and blocks in WordPress. This document covers the basic fields available in the package and how to use them.

## Text Field

The `Text` field is used to create a simple text input field.

### Example

```php
<?php

use Pollora\Metabox\Fields\Text;

Text::make('Username', 'username')
    ->placeholder('Enter your username')
    ->size(30)
    ->prepend('@')
    ->append('.com');
```

### Methods

- **`type(string|InputTextType $type)`**: Sets the input type: `text` (default), `url`, `email`, `search`, `tel`, `month`, `week` or `datetime-local`.
- **`maxCharacters(int $limit)`** / **`maxWords(int $limit)`**: Limits the length with a live counter (MB Text Limiter). See [Extensions](extensions.md#text-limiter).
- The [input settings](#input-settings) below.

### Input settings

`Text`, `Email`, `Url`, `Number`, `Range` and `Password` are input fields, and share these settings:

- **`placeholder(string $text)`**: Sets the placeholder text.
- **`size(int $size)`**: Sets the size of the input.
- **`prepend(string $text)`** / **`append(string $text)`**: Displays a text before or after the input.
- **`datalist(string $id, array $options)`**: Suggests values while typing.
- **`autocomplete(string $autocomplete)`**: Sets the browser autocomplete attribute, e.g. `email`, `tel` or `off`.
- **`minLength(int $length)`** / **`maxLength(int $length)`**: Sets the minimum or maximum number of characters, checked by the browser.
- **`pattern(string $pattern)`**: Sets a regular expression the value must match, checked by the browser, e.g. `[0-9]{5}`.

## Textarea Field

The `Textarea` field is used to create a multi-line text input field.

### Example

```php
<?php

use Pollora\Metabox\Fields\Textarea;

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

use Pollora\Metabox\Fields\Select;

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

use Pollora\Metabox\Fields\Checkbox;

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

use Pollora\Metabox\Fields\CheckboxList;

CheckboxList::make('Interests', 'interests')
    ->options([
        'sports' => 'Sports',
        'music' => 'Music',
        'movies' => 'Movies',
    ])
    ->toggleAllButton();
```

### Methods

- **`options(array $options)`**: Sets the options for the checkbox list.
- **`toggleAllButton()`**: Adds a toggle all option to the checkbox list.

## Radio Field

The `Radio` field is used to create a set of radio button input fields.

### Example

```php
<?php

use Pollora\Metabox\Fields\Radio;

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

**Previous:** [Common field settings](common-settings.md)  
**Next:** [Advanced fields](advanced-fields.md)
