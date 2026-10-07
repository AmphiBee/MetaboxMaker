<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling multiple selection options in fields.
 */
trait Multiple
{
    /**
     * Indicates whether the field allows multiple selections.
     */
    protected bool $multiple;

    /**
     * Sets whether the field allows multiple selections.
     *
     * @param  bool  $multiple  Whether the field allows multiple selections.
     * @return static The instance of the class with the updated multiple selection setting.
     */
    public function multiple(bool $multiple = true): static
    {
        $this->multiple = $multiple;

        return $this;
    }
}
