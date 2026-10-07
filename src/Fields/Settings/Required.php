<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for adding required field functionality.
 */
trait Required
{
    /**
     * Indicates whether the field is required.
     */
    protected bool $required;

    /**
     * Sets whether the field is required.
     *
     * @param  bool  $required  Whether the field is required.
     */
    public function required(bool $required = true): static
    {
        $this->required = $required;

        return $this;
    }
}
