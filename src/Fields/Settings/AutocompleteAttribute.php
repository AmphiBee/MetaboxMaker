<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for the HTML autocomplete attribute of the input.
 */
trait AutocompleteAttribute
{
    /**
     * The autocomplete attribute of the input.
     */
    protected string $autocomplete;

    /**
     * Set the autocomplete attribute of the input, e.g. 'email', 'tel' or 'off'.
     */
    public function autocomplete(string $autocomplete): static
    {
        $this->autocomplete = $autocomplete;

        return $this;
    }
}
