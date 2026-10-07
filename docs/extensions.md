# Extensions

Dedicated methods for the settings of the Meta Box extensions. Each one needs its extension, included in Meta Box AIO. For the other extensions, pass their settings with `setting()`.

## Conditional logic

Shows or hides a field, a heading, a divider or a whole meta box depending on the value of other fields. Requires [Meta Box Conditional Logic](https://docs.metabox.io/extensions/meta-box-conditional-logic/).

### Example

```php
<?php

use Pollora\Metabox\Fields\Number;
use Pollora\Metabox\Fields\Post;
use Pollora\Metabox\Fields\Select;
use Pollora\Metabox\Fields\Url;
use Pollora\Metabox\Metabox;

$linkType = Select::make('Link type', 'link_type')
    ->options(['page' => 'Page', 'custom' => 'Custom URL']);

Metabox::make('Call to action', 'cta')
    ->fields([
        $linkType,
        Post::make('Page', 'page')->postType('page')->visibleWhen($linkType, 'page'),
        Url::make('URL', 'url')->visibleWhen($linkType, 'custom'),
        Number::make('Discount', 'discount')->visibleWhen('price', '>', 100),
    ]);
```

With two arguments, the field must equal the value. With three, the second argument is the operator. The field can be given as a field instance, which keeps the condition right if the field ID changes, or as an ID. Any input name works too, such as `page_template`, `post_format` or `_thumbnail_id`: see the [Meta Box documentation](https://docs.metabox.io/extensions/meta-box-conditional-logic/#toggle-by-other-elements).

### Combining conditions

Successive calls must all match (AND). The `or` methods make any of them match (OR):

```php
// Visible when the brand is Apple AND the year is between 2010 and 2015
Text::make('Model', 'model')
    ->visibleWhen('brand', 'Apple')
    ->visibleWhen('year', 'between', [2010, 2015]);

// Hidden when the brand is Apple OR Samsung
Text::make('Model', 'model')
    ->hiddenWhen('brand', 'Apple')
    ->orHiddenWhen('brand', 'Samsung');
```

Meta Box applies a single relation to all the conditions of an element, so mixing AND and OR throws a `LogicException`.

### Methods

- **`visibleWhen(Field|string $field, mixed $operator, mixed $value = null)`**: Shows the element when the condition matches.
- **`orVisibleWhen(...)`**: Same, combined with the previous conditions with OR.
- **`hiddenWhen(...)`** / **`orHiddenWhen(...)`**: Hides the element when the condition matches.
- **`Metabox::toggleType(string|ToggleType $type)`**: Sets how fields are shown and hidden: `display` (default, the next fields move up), `visibility` (hidden fields keep their space), `slide` or `fade`.

Operators: `=`, `!=`, `>`, `>=`, `<`, `<=`, `in`, `contains`, `between`, `starts with`, `ends with`, `match`, and the `not` forms (`not in`, `not contains`, `not between`, `not starts with`, `not ends with`, `not match`). Any other operator throws an `InvalidArgumentException`.

## Columns

Lays fields out on a 12-column grid. Requires [Meta Box Columns](https://docs.metabox.io/extensions/meta-box-columns/).

```php
Text::make('First name', 'first_name')->columns(6),
Text::make('Last name', 'last_name')->columns(6),
```

- **`columns(int $columns)`**: Sets how many columns the field spans, from 1 to 12.

## Tooltip

Shows a tooltip next to the field label. Requires [Meta Box Tooltip](https://docs.metabox.io/extensions/meta-box-tooltip/).

```php
use Pollora\Metabox\Enums\TooltipPosition;

Number::make('Price', 'price')->tooltip('Price including VAT');

Number::make('Price', 'price')
    ->tooltip('Price <b>including</b> VAT', icon: 'help', position: TooltipPosition::Right, allowHtml: true);
```

- **`tooltip(string $content, ?string $icon = null, string|TooltipPosition|null $position = null, bool $allowHtml = false)`**: The icon is `info` (default), `help`, a Dashicons name or an image URL. The position is `top` (default), `bottom`, `left` or `right`.

## Admin columns

Shows the field value in a column of the admin list of posts, terms or users. Requires [MB Admin Columns](https://docs.metabox.io/extensions/mb-admin-columns/).

```php
use Pollora\Metabox\Enums\AdminColumnLink;

Text::make('Subtitle', 'subtitle')->adminColumn();

Number::make('Price', 'price')->adminColumn(
    after: 'title',
    sortable: 'numeric',
    searchable: true,
    link: AdminColumnLink::Edit,
    prepend: '$',
);
```

- **`adminColumn(...)`**: Without arguments, adds the column at the end. Named arguments:
  - `before`, `after` or `replace`: the ID of an existing column, e.g. `title` or `date`. Only one of them.
  - `title`: the column title. Defaults to the field name.
  - `sortable`: `true` to sort by value, `'numeric'` to sort numerically.
  - `searchable`: whether posts can be searched by this value.
  - `filterable`: whether posts can be filtered by this value. Taxonomy fields only.
  - `link`: link the value to the post `edit` screen or `view` page.
  - `width`: the column width, as a CSS value.
  - `prepend` / `append`: HTML displayed before or after the value.

## Text limiter

Limits the length of a `Text`, `Textarea` or `Wysiwyg` field. Requires [MB Text Limiter](https://docs.metabox.io/extensions/meta-box-text-limiter/).

```php
Text::make('SEO title', 'seo_title')->maxCharacters(60);
Textarea::make('Summary', 'summary')->maxWords(40);
```

- **`maxCharacters(int $limit)`**: Limits the number of characters.
- **`maxWords(int $limit)`**: Limits the number of words.

MB Text Limiter ignores the other field types, including `Email`, `Url` and `Number` which extend `Text`: on them, both methods throw a `LogicException`.

## Other extensions

Pass the settings of the other extensions, such as Include Exclude or Show Hide, with `setting()`:

```php
Metabox::make('Homepage', 'homepage')
    ->setting('include', ['template' => ['front-page.php']]);
```

---

**Previous:** [Settings pages](settings-pages.md)
