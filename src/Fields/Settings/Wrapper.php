<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for the field wrapper: CSS class and custom HTML around the field.
 */
trait Wrapper
{
    /**
     * Custom CSS class added to the field wrapper.
     */
    protected string $class;

    /**
     * Custom HTML output before the field.
     */
    protected string $before;

    /**
     * Custom HTML output after the field.
     */
    protected string $after;

    /**
     * Add a custom CSS class to the field wrapper.
     */
    public function class(string $class): static
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Output custom HTML before the field.
     */
    public function before(string $html): static
    {
        $this->before = $html;

        return $this;
    }

    /**
     * Output custom HTML after the field.
     */
    public function after(string $html): static
    {
        $this->after = $html;

        return $this;
    }
}
