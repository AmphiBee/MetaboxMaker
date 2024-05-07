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
 * Trait for adding required field functionality.
 */
trait Required
{
    /**
     * Indicates whether the field is required.
     *
     * @var bool
     */
    protected bool $required = false;

    /**
     * Sets whether the field is required.
     *
     * @param bool $required Whether the field is required.
     * @return static
     */
    public function required(bool $required = true): static
    {
        $this->required = $required;

        return $this;
    }
}
