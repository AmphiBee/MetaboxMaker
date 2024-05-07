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
 * Trait for handling multiple selection options in fields.
 */
trait Multiple
{
    /**
     * Indicates whether the field allows multiple selections.
     *
     * @var bool
     */
    protected bool $multiple = false;

    /**
     * Sets whether the field allows multiple selections.
     *
     * @param bool $multiple Whether the field allows multiple selections.
     * @return static The instance of the class with the updated multiple selection setting.
     */
    public function multiple(bool $multiple = true): static
    {
        $this->multiple = $multiple;

        return $this;
    }
}
