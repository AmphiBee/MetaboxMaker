<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for setting the tab slug for a field.
 */
trait Tab
{
    /**
     * @var string The tab slug the field belongs to.
     */
    protected string $tab;

    /**
     * Sets the tab slug for the field.
     *
     * @param  string  $tab  The tab slug to set.
     * @return self The instance of the class with the updated tab slug.
     */
    public function tab(string $tab): self
    {
        $this->tab = $tab;

        return $this;
    }
}
