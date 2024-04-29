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

trait Sortable
{
    protected bool $sort_clone = false;

    public function sortable(bool $sortClone = true): static
    {
        $this->sort_clone = $sortClone;

        return $this;
    }
}
