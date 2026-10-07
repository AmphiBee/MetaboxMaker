<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling force deletion of existing files.
 */
trait ForceDelete
{
    /**
     * Whether to force deletion of existing files.
     */
    protected bool $force_delete = false;

    /**
     * Set whether to force deletion of existing files.
     *
     * @param  bool  $force  Whether to force deletion.
     */
    public function forceDelete(bool $force = true): static
    {
        $this->force_delete = $force;

        return $this;
    }
}
