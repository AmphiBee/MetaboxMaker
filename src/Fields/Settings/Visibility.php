<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for hiding the field value from the REST API and front-end forms.
 */
trait Visibility
{
    /**
     * Whether the field is hidden from the REST API.
     */
    protected bool $hide_from_rest;

    /**
     * Whether the field is hidden from front-end forms (MB Frontend Submission).
     */
    protected bool $hide_from_front;

    /**
     * Whether the field is hidden from the block bindings.
     */
    protected bool $hide_from_block_bindings;

    /**
     * Hide the field from the REST API.
     */
    public function hideFromRest(bool $hide = true): static
    {
        $this->hide_from_rest = $hide;

        return $this;
    }

    /**
     * Hide the field from front-end forms.
     */
    public function hideFromFront(bool $hide = true): static
    {
        $this->hide_from_front = $hide;

        return $this;
    }

    /**
     * Hide the field from the block bindings of the block editor (WordPress 6.5+).
     */
    public function hideFromBlockBindings(bool $hide = true): static
    {
        $this->hide_from_block_bindings = $hide;

        return $this;
    }
}
