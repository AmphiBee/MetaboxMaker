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

namespace AmphiBee\MetaboxMaker\Fields\Settings;

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
     * @param bool $inline Display inline.
     * @return static Returns the instance of the class for method chaining.
     */
    public function inline(bool $inline = true): static
    {
        $this->inline = $inline;

        return $this;
    }
}
