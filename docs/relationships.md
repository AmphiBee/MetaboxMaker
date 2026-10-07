# Relationships

The `Relationship` class connects posts, terms and users with [MB Relationships](https://docs.metabox.io/extensions/mb-relationships/). The connections are stored in their own table, and can be queried in both directions.

## Basic Usage

```php
<?php

use Pollora\Metabox\Relationship;
use Pollora\Metabox\Relationships\Side;

Relationship::make('events_to_speakers')
    ->from(Side::posts('event'))
    ->to(Side::posts('speaker'));
```

This shows a meta box on the edit screen of events, to select the speakers of the event, and a meta box on the edit screen of speakers, to select their events.

The relationship is registered on the `mb_relationships_init` action, which runs on `init` with priority 5: declare it before, for instance in a service provider or in `functions.php`. Declaring it later, or declaring an ID twice, throws a `LogicException` instead of being ignored.

## Sides

A side holds the objects connected by the relationship:

- **`Side::posts(string $postType = 'post')`**: The posts of a post type.
- **`Side::terms(string $taxonomy)`**: The terms of a taxonomy.
- **`Side::users()`**: The users.

**Every setting of a side applies to the screens of its objects.** The meta box set on the from side is displayed on the edit screen of the from objects, with the field set on the from side, which selects objects of the to side. The admin column set on the from side is added to the list of the from objects.

This differs from the Meta Box array, where the field settings of a side apply to the screen of the other side. The package swaps them when building the relationship.

```php
use Pollora\Metabox\Enums\AdminColumnLink;
use Pollora\Metabox\Enums\Context;

Relationship::make('events_to_speakers')
    ->from(Side::posts('event')
        // On the edit screen of an event
        ->metaBox(title: 'Speakers', context: Context::Normal)
        ->field(placeholder: 'Select speakers', max: 10, queryArgs: ['orderby' => 'title'])
        // In the list of events
        ->adminColumn(after: 'title', link: AdminColumnLink::Edit))
    ->to(Side::posts('speaker')
        ->metaBox(title: 'Events'));
```

### Methods

- **`metaBox(?string $title = null, string|Context|null $context = null, string|Priority|null $priority = null, bool $closed = false, string|BoxStyle|null $style = null, ?string $class = null, bool $hidden = false)`**: Sets the meta box displayed on the edit screen of the objects of this side. The title defaults to "Connects To" on the from side and "Connected From" on the to side, the context to `side` and the priority to `low`. With `hidden: true`, the meta box is not displayed: the connections are managed with code.
- **`field(?string $label = null, ?string $placeholder = null, ?int $max = null, array $queryArgs = [])`**: Sets the field of the meta box, which selects the connected objects. The label defaults to the plural name of the connected post type or taxonomy, or "Users". `$max` limits the number of connected objects, and `$queryArgs` are passed to `WP_Query`, `get_terms()` or `get_users()` to list them.
- **`adminColumn(?string $before = null, ?string $after = null, ?string $replace = null, ?string $title = null, string|AdminColumnLink|false|null $link = null)`**: Lists the connected objects in a column of the admin list of this side. Without arguments, the column is added at the end, with the meta box title. The objects link to their `view` page (default) or `edit` screen, or to nothing with `link: false`.
- **`hasOne(bool $hasOne = true)`**: Connects each object of this side to one object of the other side at most.

Invalid values, such as an unknown context or a maximum below 1, throw an `InvalidArgumentException`.

## One-to-many and one-to-one

Call `hasOne()` on the side whose objects have a single partner. Each product has one brand, and each brand has many products:

```php
Relationship::make('products_to_brands')
    ->from(Side::posts('product')->hasOne())
    ->to(Side::terms('brand'));
```

For a one-to-one relationship, call `hasOne()` on both sides.

## Reciprocal relationships

A reciprocal relationship connects objects of the same type without direction, such as related posts. It has a single meta box, set on the from side:

```php
Relationship::make('related_posts')
    ->from(Side::posts()->metaBox(title: 'Related posts')->field(max: 3))
    ->to(Side::posts())
    ->reciprocal();
```

### Methods

- **`Relationship::make(string $id)`**: Creates the relationship. The ID is used to query the connections.
- **`from(Side $side)`** / **`to(Side $side)`**: Sets the sides of the relationship. Both are required.
- **`reciprocal(bool $reciprocal = true)`**: Makes the relationship reciprocal. The sides must hold the same objects, and only the from side can set a meta box, a field or an admin column: anything else throws a `LogicException`.

## Querying connections

Use the [MB Relationships API](https://docs.metabox.io/extensions/mb-relationships/#getting-connected-items) with the relationship ID:

```php
// The speakers of an event
$speakers = MB_Relationships_API::get_connected([
    'id' => 'events_to_speakers',
    'from' => get_the_ID(),
]);

// The events of a speaker, with WP_Query
$events = new WP_Query([
    'relationship' => [
        'id' => 'events_to_speakers',
        'to' => get_the_ID(),
    ],
    'nopaging' => true,
]);

// Manage connections with code
MB_Relationships_API::add($eventId, $speakerId, 'events_to_speakers');
MB_Relationships_API::has($eventId, $speakerId, 'events_to_speakers');
MB_Relationships_API::delete($eventId, $speakerId, 'events_to_speakers');
```

`get_terms()` and `get_users()` accept the same `relationship` argument.

---

**Previous:** [Extensions](extensions.md)  
**Next:** [Custom tables](custom-tables.md)
