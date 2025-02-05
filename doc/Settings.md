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

// Using enums
SettingsPage::make('Theme Options', 'theme-options')
    ->menuTitle('Theme Settings')
    ->menuType(MenuType::TOP_LEVEL)
    ->position(25)
    ->iconType(IconType::DASHICONS)
    ->icon('dashicons-admin-settings')
    ->capability('manage_options')
    ->tabs([
        'general' => 'General Settings',
        'style' => 'Style',
        'advanced' => 'Advanced'
    ])
    ->tabStyle(TabStyle::LEFT);

// Using strings
SettingsPage::make('Theme Options', 'theme-options')
    ->menuTitle('Theme Settings')
    ->menuType('top')
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
- **`menuType(MenuType|string $type)`**: Sets the menu type (`TOP_LEVEL`/`'top'` or `SUBMENU`/`'submenu'`).
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

## Usage Examples

### Simple Settings Page

```php
// Using enums
SettingsPage::make('Site Options', 'site-options')
    ->menuType(MenuType::TOP_LEVEL)
    ->iconType(IconType::DASHICONS)
    ->icon('dashicons-admin-settings')
    ->capability('manage_options');

// Using strings
SettingsPage::make('Site Options', 'site-options')
    ->menuType('top')
    ->iconType('dashicons')
    ->icon('dashicons-admin-settings')
    ->capability('manage_options');
```

### Submenu Settings Page

```php
// Using enums
SettingsPage::make('Theme Options', 'theme-options')
    ->menuTitle('Theme Settings')
    ->menuType(MenuType::SUBMENU)
    ->parent('themes.php')
    ->capability('edit_theme_options');

// Using strings
SettingsPage::make('Theme Options', 'theme-options')
    ->menuTitle('Theme Settings')
    ->menuType('submenu')
    ->parent('themes.php')
    ->capability('edit_theme_options');
```

### Settings Page with Tabs

```php
// Using enums
SettingsPage::make('Advanced Options', 'advanced-options')
    ->menuType(MenuType::TOP_LEVEL)
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

// Using strings
SettingsPage::make('Advanced Options', 'advanced-options')
    ->menuType('top')
    ->iconType('dashicons')
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
    ->tabStyle('left')
    ->columns(2);
```

### Customizer Settings Page

```php
SettingsPage::make('Customizer Options', 'customizer-options')
    ->customizer(true)
    ->optionName('my_theme_options');
```

---

**Previous:** [Block](Block.md) 