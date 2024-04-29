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

class Fieldset implements Renderable
{
    protected string $context = 'normal';

    protected array $fields = [];

    protected ?Location $location = null;

    private string|Priority|null $priority = null;

    private string $style = 'default';

    private bool $closed = false;

    private bool $default_hidden = false;

    private bool $autosave = false;

    private bool $media_modal = false;

    private ?string $class = null;

    public function __construct(protected string $title, protected string $id)
    {
    }

    public static function make(string $title, string $id): static
    {
        return new static($title, $id);
    }

    public function context(string $context): static
    {
        $this->context = OptionValidator::check($context, Context::class);

        return $this;
    }

    public function fields(array $fields): static
    {
        $this->fields = array_map(fn ($field) => $field->build(), $fields);

        return $this;
    }

    public function priority(string|Priority $priority): static
    {
        $this->priority = OptionValidator::check($priority, Priority::class);

        return $this;
    }

    public function location(Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function style(string|BoxStyle $style): static
    {
        $this->style = OptionValidator::check($style, BoxStyle::class);

        return $this;
    }

    public function closed(bool $closed): static
    {
        $this->closed = $closed;

        return $this;
    }

    public function defaultHidden(bool $defaultHidden): static
    {
        $this->default_hidden = $defaultHidden;

        return $this;
    }

    public function autosave(bool $autosave): static
    {
        $this->autosave = $autosave;

        return $this;
    }

    public function mediaModal(bool $mediaModal): static
    {
        $this->media_modal = $mediaModal;

        return $this;
    }

    public function class(?string $class): static
    {
        $this->class = $class;

        return $this;
    }

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
