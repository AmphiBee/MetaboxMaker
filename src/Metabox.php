<?php
/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/metabox-builder
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker;

use AmphiBee\MetaboxMaker\Fields\Field;
use AmphiBee\MetaboxMaker\Transformer\EmptyValueFilter;
use AmphiBee\MetaboxMaker\Transformer\FieldTransformer;
use Exception;
use AmphiBee\MetaboxMaker\Contract\Renderable;
use AmphiBee\MetaboxMaker\Enums\BoxStyle;
use AmphiBee\MetaboxMaker\Enums\Context;
use AmphiBee\MetaboxMaker\Enums\Priority;
use AmphiBee\MetaboxMaker\Validation\OptionValidation;

use add_filter;

/**
 * Fieldset class for creating a field groups.
 */
class Metabox implements Renderable
{
    use FieldTransformer;
    /**
     * The context of the fieldset.
     */
    protected string $context;

    /**
     * The fields within the fieldset.
     */
    protected array $fields = [];

    /**
     * The tabs within the fieldset.
     */
    protected array $tabs = [];

    /**
     * The location of the fieldset.
     */
    protected ?Location $location = null;

    /**
     * The priority of the fieldset.
     */
    protected string|Priority|null $priority = null;

    /**
     * The style of the fieldset.
     */
    protected string $style;

    /**
     * Whether the fieldset is initially closed.
     */
    protected bool $closed;

    /**
     * Whether the fieldset is initially hidden.
     */
    protected bool $default_hidden;

    /**
     * Whether the fieldset autosaves its content.
     */
    protected bool $autosave;

    /**
     * Whether the fieldset opens a media modal when clicked.
     */
    protected bool $media_modal;

    /**
     * The class of the fieldset.
     */
    protected string $class;

    /**
     * The description of the fieldset.
     */
    protected string $description;

    /**
     * The type of the metabox.
     */
    protected string $type;

    /**
     * The custom settings for the metabox.
     */
    protected array $settings = [];

    /**
     * Construct a new Fieldset instance.
     *
     * @param string $title The title of the fieldset.
     * @param string $id The unique identifier of the fieldset.
     */
    public function __construct(protected string $id, protected string $title)
    {
        if (!function_exists('add_filter')) {
            throw new Exception('Metabox Maker requires WordPress to be loaded.');
        }

        add_filter('rwmb_meta_boxes', function ($meta_boxes) {
            $meta_boxes[] = $this->build();
            return $meta_boxes;
        });
    }

    /**
     * Create a new Fieldset instance with default values.
     *
     * @param mixed ...$args Required arguments (title, id)
     */
    public static function make(mixed ...$args): static
    {
        [$title, $id] = $args;
        return new static($id, $title);
    }

    /**
     * Set the context of the fieldset.
     *
     * @param string $context The context of the fieldset.
     */
    public function context(string $context): static
    {
        $this->context = OptionValidation::check($context, Context::class);

        return $this;
    }

    /**
     * Add fields to the fieldset.
     *
     * @param array<Field> $fields The fields to add.
     */
    public function fields(array $fields): static
    {
        $this->buildFieldset($fields);
        return $this;
    }

    /**
     * Set the tabs of the fieldset.
     *
     * @param array $tabs The tabs of the fieldset.
     */
    public function tabs(array $tabs): static
    {
        $this->tabs = $tabs;

        return $this;
    }

    /**
     * Set the priority of the fieldset.
     *
     * @param string|Priority $priority The priority of the fieldset.
     */
    public function priority(string|Priority $priority): static
    {
        $this->priority = OptionValidation::check($priority, Priority::class);

        return $this;
    }

    /**
     * Set the location of the fieldset.
     *
     * @param Location $location The location of the fieldset.
     */
    public function location(Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Set the style of the fieldset.
     *
     * @param string|BoxStyle $style The style of the fieldset.
     */
    public function style(string|BoxStyle $style): static
    {
        $this->style = OptionValidation::check($style, BoxStyle::class);

        return $this;
    }

    /**
     * Set whether the fieldset is initially closed.
     *
     * @param bool $closed Whether the fieldset is initially closed.
     */
    public function closed(bool $closed): static
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Set whether the fieldset is initially hidden.
     *
     * @param bool $defaultHidden Whether the fieldset is initially hidden.
     */
    public function defaultHidden(bool $defaultHidden): static
    {
        $this->default_hidden = $defaultHidden;

        return $this;
    }

    /**
     * Set whether the fieldset autosaves its content.
     *
     * @param bool $autosave Whether the fieldset autosaves its content.
     */
    public function autosave(bool $autosave): static
    {
        $this->autosave = $autosave;

        return $this;
    }

    /**
     * Set whether the fieldset opens a media modal when clicked.
     *
     * @param bool $mediaModal Whether the fieldset opens a media modal when clicked.
     */
    public function mediaModal(bool $mediaModal): static
    {
        $this->media_modal = $mediaModal;

        return $this;
    }

    /**
     * Set the class of the fieldset.
     *
     * @param string|null $class The class of the fieldset.
     */
    public function class(?string $class): static
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Set the description of the fieldset.
     *
     * @param string $description The description of the fieldset.
     * @return static
     */
    public function description(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Set the type of the fieldset.
     *
     * @param string $type The type of the fieldset.
     * @return static
     */
    public function type(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set a custom setting for the metabox.
     *
     * @param string $key The setting key.
     * @param mixed $value The setting value.
     * @return static
     */
    public function setting(string $key, mixed $value): static
    {
        $this->settings[$key] = $value;
        return $this;
    }

    /**
     * Get the custom settings for the metabox.
     *
     * @return array The custom settings.
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * Build the fieldset and return its settings.
     *
     * @return array The settings of the fieldset.
     */
    public function build(): array
    {
        if (!$this->location) {
            $this->location = Location::default();
        }

        $metaboxData = EmptyValueFilter::filter(get_object_vars($this));

        // Remove the settings array and location from the metabox data
        unset($metaboxData['settings'], $metaboxData['location']);

        // Merge custom settings if they exist
        if (!empty($this->settings)) {
            $metaboxData = array_merge($metaboxData, $this->settings);
        }

        return $metaboxData + $this->location->get();
    }
}
