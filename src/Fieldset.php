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
use AmphiBee\MetaboxMaker\Helpers\OptionValidator;

/**
 * Fieldset class for creating a field groups.
 *
 * @package AmphiBee\MetaboxMaker
 */
final class Fieldset implements Renderable
{
    /**
     * The context of the fieldset.
     *
     * @var string
     */
    private string $context = 'normal';

    /**
     * The fields within the fieldset.
     *
     * @var array
     */
    protected array $fields = [];

    /**
     * The location of the fieldset.
     *
     * @var Location|null
     */
    protected ?Location $location = null;

    /**
     * The priority of the fieldset.
     *
     * @var string|Priority|null
     */
    private string|Priority|null $priority = null;

    /**
     * The style of the fieldset.
     *
     * @var string
     */
    private string $style = 'default';

    /**
     * Whether the fieldset is initially closed.
     *
     * @var bool
     */
    private bool $closed = false;

    /**
     * Whether the fieldset is initially hidden.
     *
     * @var bool
     */
    private bool $default_hidden = false;

    /**
     * Whether the fieldset autosaves its content.
     *
     * @var bool
     */
    private bool $autosave = false;

    /**
     * Whether the fieldset opens a media modal when clicked.
     *
     * @var bool
     */
    private bool $media_modal = false;

    /**
     * The class of the fieldset.
     *
     * @var string|null
     */
    private ?string $class = null;

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
     *
     * @return static
     */
    public static function make(string $title, string $id): static
    {
        return new static($title, $id);
    }

    /**
     * Set the context of the fieldset.
     *
     * @param string $context The context of the fieldset.
     *
     * @return static
     */
    public function context(string $context): static
    {
        $this->context = OptionValidator::check($context, Context::class);

        return $this;
    }

    /**
     * Add fields to the fieldset.
     *
     * @param array $fields The fields to add.
     *
     * @return static
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
     *
     * @return static
     */
    public function priority(string|Priority $priority): static
    {
        $this->priority = OptionValidator::check($priority, Priority::class);

        return $this;
    }

    /**
     * Set the location of the fieldset.
     *
     * @param Location $location The location of the fieldset.
     *
     * @return static
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
     *
     * @return static
     */
    public function style(string|BoxStyle $style): static
    {
        $this->style = OptionValidator::check($style, BoxStyle::class);

        return $this;
    }

    /**
     * Set whether the fieldset is initially closed.
     *
     * @param bool $closed Whether the fieldset is initially closed.
     *
     * @return static
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
     *
     * @return static
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
     *
     * @return static
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
     *
     * @return static
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
     *
     * @return static
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

        $settings = array_filter(get_object_vars($this));
        unset($settings['location']);

        return $settings + $this->location->get();
    }
}
