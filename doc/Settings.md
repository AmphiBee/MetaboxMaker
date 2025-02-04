# Creating Settings Pages with MetaboxMaker

MetaboxMaker allows you to easily create settings pages in WordPress using the `SettingsPage` class. This functionality relies on the [MB Settings Page](https://docs.metabox.io/extensions/mb-settings-page/) extension of the Meta Box plugin.

## Basic Usage

To create a settings page, use the `SettingsPage::make()` method which initializes a new page with an ID and menu title. You can then chain methods to configure the page's properties.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\SettingsPage;
use AmphiBee\MetaboxMaker\Enums\MenuType;
use AmphiBee\MetaboxMaker\Enums\IconType;
use AmphiBee\MetaboxMaker\Enums\TabStyle;

SettingsPage::make('theme-options', 'Theme Options')
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
```

### Available Methods

#### Menu Configuration

- **`menuType(MenuType|string $type)`**: Sets the menu type (`TOP_LEVEL` or `SUBMENU`).
- **`position(int $position)`**: Sets the menu position in the sidebar.
- **`submenuTitle(string $title)`**: Sets the default first submenu title.
- **`parent(string $parent)`**: Sets the parent menu slug (for submenus).

#### Icon Configuration

- **`iconType(IconType|string $type)`**: Sets the icon type (`DASHICONS`, `FONTAWESOME`, `SVG`, `URL`).
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
- **`tabStyle(TabStyle|string $style)`**: Sets the tab style (`DEFAULT` or `LEFT`).

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
SettingsPage::make('site-options', 'Site Options')
    ->menuType(MenuType::TOP_LEVEL)
    ->iconType(IconType::DASHICONS)
    ->icon('dashicons-admin-settings')
    ->capability('manage_options');
```

### Submenu Settings Page

```php
SettingsPage::make('theme-options', 'Theme Options')
    ->menuType(MenuType::SUBMENU)
    ->parent('themes.php')
    ->capability('edit_theme_options');
```

### Settings Page with Tabs

```php
SettingsPage::make('advanced-options', 'Advanced Options')
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
```

### Customizer Settings Page

```php
SettingsPage::make('customizer-options', 'Customizer Options')
    ->customizer(true)
    ->optionName('my_theme_options');
```

---

**Previous:** [Block](Block.md) 