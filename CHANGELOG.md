# Changelog

## 2.3.0 - 2026-10-07

### Added

- `Metabox::include()`, `exclude()` (MB Include Exclude), `show()` and `hide()` (MB Show Hide), taking a `Rule` or a group of rules built with `Rule::all()` (AND) or `Rule::any()` (OR).
- `Rule` constructors for every rule of both extensions, including the `capability` rule. Rules unsupported by the method, and rules with the same key combined with AND, throw an exception.

## 2.2.0 - 2026-10-07

### Added

- Conditional logic (Meta Box Conditional Logic): `visibleWhen()`, `orVisibleWhen()`, `hiddenWhen()` and `orHiddenWhen()` on fields, headings, dividers and meta boxes, accepting a field instance or an ID, and `Metabox::toggleType()`. Operators are validated.
- `columns()` on fields (Meta Box Columns).
- `tooltip()` on fields (Meta Box Tooltip).
- `adminColumn()` on fields (MB Admin Columns), with named arguments.
- `maxCharacters()` and `maxWords()` on Text, Textarea and Wysiwyg fields (MB Text Limiter).
- `Field::getId()`.
- `ToggleType`, `TooltipPosition` and `AdminColumnLink` enums.
- Documentation page for the extensions.

## 2.1.0 - 2026-10-07

### Added

- `BlockEditor` field (`block_editor`), with `allowedBlocks()`, `height()` and `toolbarPosition()`.
- `Link` field.
- `Text::type()` accepts the `search`, `tel`, `month`, `week` and `datetime-local` input types.
- Meta box tab settings: `tabStyle()`, `tabWrapper()`, `tabDefaultActive()` and `tabRemember()`. `TabStyle::BOX` is added.
- `Metabox::validation()` for validation rules and messages.
- `Metabox::revision()` (MB Revision).
- `Metabox::customTable()` and `Metabox::storageType()` (MB Custom Table). `storageType()` was only available on blocks.
- `BlockMode` and `ToolbarPosition` enums.

### Changed

- `Block::mode()` only accepts `edit` and `preview`, and throws an exception for any other value. Meta Box displayed blocks with another value, such as `auto`, in preview mode: see the [upgrade guide](UPGRADE.md#from-pollorametabox-20-to-21).

### Documentation

- Complete list of the meta box and block methods.

## 2.0.0 - 2026-10-07

The package moves to the Pollora organization. Follow the [upgrade guide](UPGRADE.md) to migrate from `amphibee/metabox-maker`.

### Changed

- The package is renamed `pollora/metabox`, and the namespace `AmphiBee\MetaboxMaker` is now `Pollora\Metabox`. There is no compatibility layer for the former names.
- License: MIT instead of GPL-2.0-or-later.
- PHP 8.2 or later is required.
- The documentation moves to `docs/`, with one page per topic.

### Removed

- The `Fieldset` field: use `FieldsetText`.
- `Button::setAttributes()`: use `attributes()`, available on every field.
- `Taxonomy::taxonomy()`: use `taxonomies()`.

## 1.0.0 - 2026-10-07

First tagged release. Projects previously required `dev-main`: switch to `^1.0` and read the upgrade notes below.

### Upgrade notes

- **Taxonomy / TaxonomyAdvanced fields now use the taxonomy you pass.** The field emitted a `taxonomies` key that Meta Box ignores, so it always listed **categories**, whatever was passed to `taxonomies()`. After upgrading:
  - fields declared with a real taxonomy now list the right terms, but values saved so far are category IDs and may need to be cleaned up or migrated;
  - fields declared with something that is not a taxonomy (for instance `taxonomies(['post'])`) only worked by accident and now list nothing: use `taxonomies('category')`;
  - the `->setting('taxonomy', ...)` workaround still works and can be replaced by `->taxonomy(...)`.
- **SettingsPage menu icons are now applied.** `iconType()`, `icon()` and `iconSvg()` are converted to the `icon_url` setting read by MB Settings Page. They had no effect before, so settings pages may show a new menu icon.
- **`Context::Side` and `Context::FormTop`** now hold `side` and `form_top`. The string values `'side'` and `'normal'` behave as before.
- **Block default category** is `design` instead of `layout`, which no longer exists since WordPress 5.8. Blocks that call `category()` are not affected.
- **Calling `ajax()`** on Post, Taxonomy and User fields switches the default `select` field type to `select_advanced`, the only one Meta Box supports AJAX with.
- **Strict types**: library and test files now declare `strict_types`. This only affects code calling the library from a file that declares it too.

### Fixed

- Taxonomy and TaxonomyAdvanced fields emit `taxonomy` instead of `taxonomies`.
- GoogleMap emits the `map` type instead of `google_map`, which Meta Box rendered as a plain text input.
- Fieldset emits `fieldset_text`: Meta Box has no `fieldset` type. `Fieldset` is deprecated in favor of `FieldsetText`.
- `Context::Side` was `seamless` and `Context::FormTop` was `side`.
- `Metabox::class(null)` threw a `TypeError`.
- `Location::default()` emitted `post_type` instead of `post_types`. The tests and docs used the same wrong key.
- SettingsPage icon settings were ignored at runtime.
- SettingsPage is not registered twice when built inside the `mb_settings_pages` filter, like Metabox.
- Slider forced its initial position to 0 and ignored `default()`.
- Block post type restrictions matched any block whose name contained the block ID, such as `meta-box/hero-banner` for `hero`. They now match the exact `meta-box/{id}` name, and `restrictToPostTypes()` and `excludePostTypes()` combine instead of overwriting each other.
- `ajax()` was silently ignored with the default `select` field type.
- Group and Tab refused Heading and Divider.

### Added

- `attributes()` and `attribute()` on every field. They were only available on Button, as `setAttributes()`.
- `class()`, `before()`, `after()`, `saveField()`, `sanitizeCallback()`, `hideFromRest()` and `hideFromFront()` on every field.
- `Taxonomy::taxonomy()`, an alias of `taxonomies()`.
- `Location::postTypes()`, `taxonomies()`, `settingsPages()`, `user()`, `comment()` and `andWhere()`.
- Documentation of the settings shared by all fields (`doc/CommonSettings.md`).

### Internal

- The test suite runs again: `doing_filter()` had no stub since the "already in the rwmb_meta_boxes filter" fix.
- PHPStan level 5 with the WordPress extension, Pint configuration and GitHub workflows for tests and coding standards, aligned with the Pollora packages.
- `laravel/pint` moved from `require` to `require-dev`.
