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

trait FieldAccess
{
    protected bool $readonly = false;

    protected bool $disabled = false;

    public function readOnly(bool $readOnly = true): static
    {
        $this->readonly = $readOnly;

        return $this;
    }

    public function disabled(bool $disabled = true): static
    {
        $this->disabled = $disabled;

        return $this;
    }
}
