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
 * Trait for adding sortable functionality to fields.
 */
trait Sortable
{
    /**
     * Indicates whether the field should be sortable and cloned when sorting.
     *
     * @var bool
     */
    protected bool $sort_clone = false;

    /**
     * Sets whether the field should be sortable and cloned when sorting.
     *
     * @param bool $sortClone Whether the field should be sortable and cloned when sorting.
     * @return static The instance of the class with the updated sorting behavior.
     */
    public function sortable(bool $sortClone = true): static
    {
        $this->sort_clone = $sortClone;

        return $this;
    }
}
