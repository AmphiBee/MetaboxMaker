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
