# HTML5 Fields in MetaboxMaker

MetaboxMaker provides a variety of HTML5 fields that can be used to create modern and interactive metaboxes and blocks in WordPress. This document covers the HTML5 fields available in the package and how to use them.

## Email Field

The `Email` field is used to create email input fields. It extends the `Text` field and sets the input type to `email`.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Email;

Email::make('Email Address', 'email_address')
    ->size(30)
    ->prepend('user@')
    ->append('.com');
```

### Methods

- **`size(int $size)`**: Sets the size of the input field.
- **`prepend(string $text)`**: Sets the text to prepend to the input field.
- **`append(string $text)`**: Sets the text to append to the input field.

## Number Field

The `Number` field is used to create number input fields. It extends the `Text` field and sets the input type to `number`. It uses the `RangeParams` trait to provide additional configuration options.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Number;

Number::make('Quantity', 'quantity')
    ->min(1)
    ->max(100)
    ->step(1);
```

### Methods

- **`min(int $min)`**: Sets the minimum value for the number field.
- **`max(int $max)`**: Sets the maximum value for the number field.
- **`step(int $step)`**: Sets the step value for the number field.

## Range Field

The `Range` field is used to create range input fields. It extends the `Text` field and sets the input type to `range`. It uses the `RangeParams` trait to provide additional configuration options.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Range;

Range::make('Volume', 'volume')
    ->min(0)
    ->max(100)
    ->step(5);
```

### Methods

- **`min(int $min)`**: Sets the minimum value for the range field.
- **`max(int $max)`**: Sets the maximum value for the range field.
- **`step(int $step)`**: Sets the step value for the range field.

## Url Field

The `Url` field is used to create URL input fields. It extends the `Text` field and sets the input type to `url`.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Url;

Url::make('Website', 'website')
    ->size(50)
    ->prepend('https://')
    ->append('.com');
```

### Methods

- **`size(int $size)`**: Sets the size of the input field.
- **`prepend(string $text)`**: Sets the text to prepend to the input field.
- **`append(string $text)`**: Sets the text to append to the input field.

---

**Previous :** [Advanced Fields](Advanced.md)  
**Next :** [WordPress Fields](WordPress.md) 