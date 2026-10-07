<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling max status settings.
 */
trait MaxStatus
{
    /**
     * Whether to show the max status.
     *
     * @var bool Whether to show the "max" status. Default is true.
     */
    protected bool $max_status;

    /**
     * Set whether to show the "max" status.
     *
     * @param  bool  $show  Whether to show the "max" status.
     */
    public function showMaxStatus(bool $show = true): static
    {
        $this->max_status = $show;

        return $this;
    }
}
