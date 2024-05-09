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
