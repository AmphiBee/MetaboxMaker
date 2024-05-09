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

use AmphiBee\MetaboxMaker\Contract\Renderable;
use AmphiBee\MetaboxMaker\Enums\BoxStyle;
use AmphiBee\MetaboxMaker\Enums\Context;
use AmphiBee\MetaboxMaker\Enums\Priority;
use AmphiBee\MetaboxMaker\Validation\OptionValidation;

/**
 * Fieldset class for creating a field groups.
 *
 * @package AmphiBee\MetaboxMaker
 */
class Fieldset implements Renderable
{
    /**
     * The context of the fieldset.
     */
    protected string $context = 'normal';

    /**
     * The fields within the fieldset.
     */
    protected array $fields;

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
    protected string $style = 'default';

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
     * Construct a new Fieldset instance.
     *
     * @param string $title The title of the fieldset.
     * @param string $id The unique identifier of the fieldset.
     */
    public function __construct(protected string $title, protected string $id)
    {
    }

    /**
     * Create a new Fieldset instance with default values.
     *
     * @param string $title The title of the fieldset.
     * @param string $id The unique identifier of the fieldset.
     */
    public static function make(string $title, string $id): static
    {
        return new static($title, $id);
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
     * @param array $fields The fields to add.
     */
    public function fields(array $fields): static
    {
        $this->fields = array_map(fn ($field) => $field->build(), $fields);

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
     * Build the fieldset and return its settings.
     *
     * @return array The settings of the fieldset.
     */
    public function build(): array
    {
        if (! $this->location) {
            $this->location = Location::default();
        }

        $settings = array_filter(get_object_vars($this), fn($value) => (!is_array($value) && $value !== null) || (is_array($value) && !empty($value)));

        unset($settings['location']);

        return $settings + $this->location->get();
    }
}
