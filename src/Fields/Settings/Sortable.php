<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for adding sortable functionality to fields.
 */
trait Sortable
{
    /**
     * Indicates whether the field should be sortable and cloned when sorting.
     */
    protected bool $sort_clone;

    /**
     * Sets whether the field should be sortable and cloned when sorting.
     *
     * @param  bool  $sortClone  Whether the field should be sortable and cloned when sorting.
     * @return static The instance of the class with the updated sorting behavior.
     */
    public function sortable(bool $sortClone = true): static
    {
        $this->sort_clone = $sortClone;

        return $this;
    }
}
