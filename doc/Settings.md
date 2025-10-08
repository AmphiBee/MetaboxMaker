# Creating Settings Pages with MetaboxMaker

MetaboxMaker allows you to easily create settings pages in WordPress using the `SettingsPage` class. This functionality relies on the [MB Settings Page](https://docs.metabox.io/extensions/mb-settings-page/) extension of the Meta Box plugin.

## Basic Usage

To create a settings page, use the `SettingsPage::make()` method which initializes a new page with a page title and an ID. By default, the menu title will be the same as the page title, but you can customize it using the `menuTitle()` method.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\SettingsPage;
use AmphiBee\MetaboxMaker\Enums\MenuType;
use AmphiBee\MetaboxMaker\Enums\IconType;
use AmphiBee\MetaboxMaker\Enums\TabStyle;

SettingsPage::make('Theme Options', 'theme-options')
    ->menuTitle('Theme Settings')
    ->position(25)
    ->iconType('dashicons')
    ->icon('dashicons-admin-settings')
    ->capability('manage_options')
    ->tabs([
        'general' => 'General Settings',
        'style' => 'Style',
        'advanced' => 'Advanced'
    ])
    ->tabStyle('left');
```

### Available Methods

#### Menu Configuration

- **`menuTitle(string $title)`**: Sets a custom menu title (different from page title).
- **`position(int $position)`**: Sets the menu position in the sidebar.
- **`submenuTitle(string $title)`**: Sets the default first submenu title.
- **`parent(string $parent)`**: Sets the parent menu slug (for submenus).

#### Icon Configuration

- **`iconType(IconType|string $type)`**: Sets the icon type (`DASHICONS`/`'dashicons'`, `FONTAWESOME`/`'fontawesome'`, `SVG`/`'svg'`, `URL`/`'url'`).
- **`icon(string $icon)`**: Sets the icon (for Dashicons or Font Awesome).
- **`iconSvg(string $svg)`**: Sets the custom SVG icon.
- **`iconUrl(string $url)`**: Sets the custom icon URL.

#### Display Configuration

- **`capability(string $capability)`**: Sets the required capability to access the page.
- **`class(string $class)`**: Adds a custom CSS class.
- **`style(string $style)`**: Sets the page style (`boxes` or `no-boxes`).
- **`columns(int $columns)`**: Sets the number of columns (1 or 2).

#### Tabs Configuration

- **`tabs(array $tabs)`**: Sets the page tabs.
- **`tabStyle(TabStyle|string $style)`**: Sets the tab style (`DEFAULT`/`'default'` or `LEFT`/`'left'`).

#### Message Configuration

- **`submitButton(string $text)`**: Customizes the submit button text.
- **`message(string $message)`**: Customizes the message displayed when saving.

#### Customizer Configuration

- **`customizer(bool $enabled)`**: Enables display in the Customizer.
- **`customizerOnly(bool $enabled)`**: Shows only in the Customizer.

#### Network Configuration

- **`network(bool $enabled)`**: Enables network-wide settings (multisite).
- **`optionName(string $name)`**: Sets the option name for storing settings.

#### Custom Settings

- **`setting(string $key, mixed $value)`**: Adds a custom Meta Box setting that isn't explicitly defined. This allows you to pass any Meta Box-specific option directly.

## Usage Examples

### Simple Settings Page

```php
// Using enums
SettingsPage::make('Site Options', 'site-options')
    ->iconType(IconType::DASHICONS)
    ->icon('dashicons-admin-settings')
    ->capability('manage_options');

// Using strings
SettingsPage::make('Site Options', 'site-options')
    ->iconType('dashicons')
    ->icon('dashicons-admin-settings')
    ->capability('manage_options');
```

### Submenu Settings Page

```php
SettingsPage::make('Theme Options', 'theme-options')
    ->menuTitle('Theme Settings')
    ->parent('themes.php')
    ->capability('edit_theme_options');
```

### Settings Page with Tabs

```php
SettingsPage::make('Advanced Options', 'advanced-options')
    ->iconType(IconType::DASHICONS)
    ->icon('dashicons-admin-tools')
    ->tabs([
        'general' => [
            'label' => 'General',
            'icon' => 'dashicons-admin-settings'
        ],
        'appearance' => [
            'label' => 'Appearance',
            'icon' => 'dashicons-admin-customizer'
        ]
    ])
    ->tabStyle(TabStyle::LEFT)
    ->columns(2);
```

### Customizer Settings Page

```php
SettingsPage::make('Customizer Options', 'customizer-options')
    ->customizer(true)
    ->optionName('my_theme_options');
```

## Custom Settings

The `setting()` method allows you to add any Meta Box settings page option that isn't explicitly provided by MetaboxMaker. This is particularly useful for advanced configurations.

### Example with Custom Settings

```php
<?php

SettingsPage::make('Advanced Settings', 'advanced-settings')
    ->parent('options-general.php')
    ->setting('help_tabs', [
        [
            'title' => 'Overview',
            'content' => '<p>This is the overview tab content.</p>'
        ],
        [
            'title' => 'FAQ',
            'content' => '<p>Frequently asked questions...</p>'
        ]
    ])
    ->setting('contextual_help', 'This is contextual help content')
    ->setting('ajax', true)
    ->setting('sanitize_callback', 'custom_sanitize_function')
    ->tabs([
        'general' => 'General',
        'advanced' => 'Advanced'
    ]);
```

### Use Cases for Custom Settings

Custom settings are useful when you need to:
- Add help tabs to your settings page
- Set up custom sanitization callbacks
- Enable AJAX functionality
- Add any Meta Box Settings Page feature not yet wrapped by MetaboxMaker

### Important Note

When using custom settings, refer to the [Meta Box Settings Page documentation](https://docs.metabox.io/extensions/mb-settings-page/) for available options and their correct format.

---

**Previous:** [Block](Block.md) 
