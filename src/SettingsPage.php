<?php

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker;

use AmphiBee\MetaboxMaker\Contract\Renderable;
use AmphiBee\MetaboxMaker\Enums\MenuType;
use AmphiBee\MetaboxMaker\Enums\IconType;
use AmphiBee\MetaboxMaker\Enums\TabStyle;
use AmphiBee\MetaboxMaker\Transformer\EmptyValueFilter;
use AmphiBee\MetaboxMaker\Validation\OptionValidation;
use Exception;

class SettingsPage implements Renderable
{
    /**
     * Menu type (top-level or submenu)
     */
    protected string $menu_type;

    /**
     * Menu position
     */
    protected ?int $position = null;

    /**
     * Default first submenu title
     */
    protected ?string $menu_title = null;

    /**
     * Default first submenu title
     */
    protected ?string $submenu_title = null;

    /**
     * Icon type (dashicons, fontawesome, svg, url)
     */
    protected string $icon_type;

    /**
     * Icon value
     */
    protected ?string $icon = null;

    /**
     * Icon SVG
     */
    protected ?string $icon_svg = null;

    /**
     * Icon URL
     */
    protected ?string $icon_url = null;

    /**
     * Parent menu slug
     */
    protected ?string $parent = null;

    /**
     * Required capability
     */
    protected string $capability = 'edit_theme_options';

    /**
     * Custom CSS class
     */
    protected ?string $class = null;

    /**
     * Page style
     */
    protected string $style = 'boxes';

    /**
     * Number of columns
     */
    protected int $columns = 1;

    /**
     * Tabs configuration
     */
    protected array $tabs = [];

    /**
     * Tab style
     */
    protected string $tab_style = 'default';

    /**
     * Custom submit button text
     */
    protected ?string $submit_button = null;

    /**
     * Custom save message
     */
    protected ?string $message = null;

    /**
     * Help tabs content
     */
    protected array $help_tabs = [];

    /**
     * Show in customizer
     */
    protected bool $customizer = false;

    /**
     * Show only in customizer
     */
    protected bool $customizer_only = false;

    /**
     * Network-wide settings
     */
    protected bool $network = false;

    /**
     * Option name for storing settings
     */
    protected ?string $option_name = null;

    /**
     * Constructor for the SettingsPage class.
     *
     * @param string $page_title The title of the settings page
     * @param string $id The unique identifier for the settings page
     */
    public function __construct(protected string $page_title, protected string $id)
    {
        if (!function_exists('add_filter')) {
            throw new Exception('Metabox Maker requires WordPress to be loaded.');
        }

        $this->menu_title = $page_title;

        add_filter('mb_settings_pages', function ($settings_pages) {
            $settings_pages[] = $this->build();
            return $settings_pages;
        });
    }

    /**
     * Create a new SettingsPage instance.
     *
     * @param mixed ...$args Required arguments (page_title, id)
     */
    public static function make(mixed ...$args): static
    {
        [$page_title, $id] = $args;
        return new static($page_title, $id);
    }

    public function menuType(string|MenuType $type): static
    {
        $this->menu_type = OptionValidation::check($type, MenuType::class);
        return $this;
    }

    public function position(int $position): static
    {
        $this->position = $position;
        return $this;
    }

    public function menuTitle(string $title): static
    {
        $this->menu_title = $title;
        return $this;
    }

    public function submenuTitle(string $title): static
    {
        $this->submenu_title = $title;
        return $this;
    }

    public function iconType(string|IconType $type): static
    {
        $this->icon_type = OptionValidation::check($type, IconType::class);
        return $this;
    }

    public function icon(string $icon): static
    {
        $this->icon = $icon;
        return $this;
    }

    public function iconSvg(string $svg): static
    {
        $this->icon_svg = $svg;
        return $this;
    }

    public function iconUrl(string $url): static
    {
        $this->icon_url = $url;
        return $this;
    }

    public function parent(string $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

    public function capability(string $capability): static
    {
        $this->capability = $capability;
        return $this;
    }

    public function class(string $class): static
    {
        $this->class = $class;
        return $this;
    }

    public function style(string $style): static
    {
        $this->style = $style;
        return $this;
    }

    public function columns(int $columns): static
    {
        $this->columns = $columns;
        return $this;
    }

    public function tabs(array $tabs): static
    {
        $this->tabs = $tabs;
        return $this;
    }

    public function tabStyle(string|TabStyle $style): static
    {
        $this->tab_style = OptionValidation::check($style, TabStyle::class);
        return $this;
    }

    public function submitButton(string $text): static
    {
        $this->submit_button = $text;
        return $this;
    }

    public function message(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function helpTabs(array $tabs): static
    {
        $this->help_tabs = $tabs;
        return $this;
    }

    public function customizer(bool $enabled = true): static
    {
        $this->customizer = $enabled;
        return $this;
    }

    public function customizerOnly(bool $enabled = true): static
    {
        $this->customizer_only = $enabled;
        return $this;
    }

    public function network(bool $enabled = true): static
    {
        $this->network = $enabled;
        return $this;
    }

    public function optionName(string $name): static
    {
        $this->option_name = $name;
        return $this;
    }

    public function build(): array
    {
        return EmptyValueFilter::filter(get_object_vars($this));
    }
} 