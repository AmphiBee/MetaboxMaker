<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for inline mode.
 */
trait Inline
{
    /**
     * Whether to display inline.
     */
    protected bool $inline;

    /**
     * Set whether the inputs are displayed inline.
     *
     * @param  bool  $inline  Display inline.
     * @return static Returns the instance of the class for method chaining.
     */
    public function inline(bool $inline = true): static
    {
        $this->inline = $inline;

        return $this;
    }
}
