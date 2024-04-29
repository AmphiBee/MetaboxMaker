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

trait DefaultValue
{
    protected mixed $std = null;

    public function default($value): static
    {
        $this->std = $value;

        return $this;
    }
}
