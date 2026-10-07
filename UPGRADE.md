# Upgrade guide

## From pollora/metabox 2.2 to 2.3

Nothing needs to change: 2.3 only adds methods.

`include`, `exclude`, `show` and `hide` settings passed with `setting()` keep working. Note that Meta Box combines their rules with OR by default: use `Rule::any()` to keep the same behavior when replacing them.

| Before | After |
|---|---|
| `->setting('include', ['template' => ['front-page.php']])` | `->include(Rule::template('front-page.php'))` |
| `->setting('exclude', ['ID' => [12, 14], 'is_child' => true])` | `->exclude(Rule::any(Rule::postIds(12, 14), Rule::isChild()))` |
| `->setting('show', ['relation' => 'AND', 'post_format' => ['video'], 'category' => ['News']])` | `->show(Rule::all(Rule::postFormat('video'), Rule::category('News')))` |

## From pollora/metabox 2.1 to 2.2

Nothing needs to change: 2.2 only adds methods.

Settings passed with `setting()` keep working. They can be replaced with the new methods, which validate their values:

| Before | After |
|---|---|
| `->setting('visible', ['link_type', '=', 'page'])` | `->visibleWhen('link_type', 'page')` |
| `->setting('hidden', ['is_toggle', '1'])` | `->hiddenWhen('is_toggle', '1')` |
| `->setting('columns', 6)` | `->columns(6)` |
| `->setting('tooltip', 'Help text')` | `->tooltip('Help text')` |
| `->setting('admin_columns', 'after title')` | `->adminColumn(after: 'title')` |
| `->setting('limit', 160)` | `->maxCharacters(160)` |

## From pollora/metabox 2.0 to 2.1

`Block::mode()` only accepts the values Meta Box supports, `edit` and `preview`, and throws an `InvalidArgumentException` for any other value. Meta Box displayed blocks with another value, such as `auto`, in preview mode: replace it with `preview` to keep the same behavior.

```bash
grep -rn "\->mode('auto')" app config --include='*.php'
```

```php
// Before
Block::make('Hero', 'hero')->mode('auto');

// After
Block::make('Hero', 'hero')->mode('preview');
```

Nothing else needs to change: 2.1 only adds methods and fields.

## From amphibee/metabox-maker 1.x to pollora/metabox 2.x

`amphibee/metabox-maker` is now `pollora/metabox`, and the `AmphiBee\MetaboxMaker` namespace is now `Pollora\Metabox`. Version 2.0 has no compatibility layer: the former names no longer exist, so every reference must be renamed. The package API is otherwise unchanged, apart from the few removals listed in step 4.

`amphibee/metabox-maker` is abandoned and stays at 1.0.0. A project not migrated yet keeps working on `^1.0`.

### 1. Check the prerequisites

- PHP 8.2 or later.
- `amphibee/metabox-maker` 1.0.0, with its [upgrade notes](CHANGELOG.md#100---2026-10-07) applied. Projects still on `dev-main` or `0.9` must go through 1.0 first: it changes what Taxonomy fields display and how settings page icons are set.

### 2. Replace the package

```bash
composer remove amphibee/metabox-maker
composer require pollora/metabox:^2.0
```

Until step 3 is done, the project fails with `Class "AmphiBee\MetaboxMaker\..." not found`: do both steps together.

### 3. Rename the namespace

The new namespace keeps the same class names and sub-namespaces (`Fields`, `Enums`, `Fields\Settings`…), so a prefix replacement is enough. Run this from the project root, on the directories that hold your code (here `app` and `config`; for a theme or a plugin, `web/app/themes/<theme>` or the plugin directory):

```bash
grep -rlF 'AmphiBee\' app config --include='*.php' \
  | xargs sed -i -e 's/AmphiBee\\\\MetaboxMaker/Pollora\\\\Metabox/g' -e 's/AmphiBee\\MetaboxMaker/Pollora\\Metabox/g'
```

On macOS, use `sed -i ''` instead of `sed -i`.

The two expressions cover every form of the name:

| Before | After |
|---|---|
| `use AmphiBee\MetaboxMaker\Fields\Text;` | `use Pollora\Metabox\Fields\Text;` |
| `\AmphiBee\MetaboxMaker\Metabox::class` | `\Pollora\Metabox\Metabox::class` |
| `'AmphiBee\MetaboxMaker\Location'` | `'Pollora\Metabox\Location'` |
| `"AmphiBee\\MetaboxMaker\\Block"` | `"Pollora\\Metabox\\Block"` |
| `@var \AmphiBee\MetaboxMaker\Fields\Group` | `@var \Pollora\Metabox\Fields\Group` |

The `use` statements now start with `Pollora` instead of `AmphiBee`, so they may no longer be sorted: run your code formatter (for instance `vendor/bin/pint`).

### 4. Replace the removed methods and classes

| Removed | Use instead |
|---|---|
| `Fieldset` field | `FieldsetText`, with `options()` instead of `inputs()` |
| `Button::setAttributes()` | `attributes()`, available on every field |
| `Taxonomy::taxonomy()` / `TaxonomyAdvanced::taxonomy()` | `taxonomies()` |
| `Block::mode('auto')`, or any value other than `edit` and `preview` (since 2.1) | `mode('preview')`: Meta Box already displayed these blocks in preview mode |

Find them with:

```bash
grep -rnE "Fields\\\\Fieldset;|Fieldset::make|->setAttributes\(|->taxonomy\(|->mode\('auto'\)" app config --include='*.php'
```

`->taxonomy(` can also match unrelated code: only change the calls made on a Taxonomy or TaxonomyAdvanced field.

### 5. Check the result

```bash
# No former name left: this must print nothing
grep -rnF 'AmphiBee\' app config --include='*.php' | grep MetaboxMaker

composer dump-autoload
```

Then open the admin screens that use meta boxes, blocks and settings pages, and check that they display their fields.
