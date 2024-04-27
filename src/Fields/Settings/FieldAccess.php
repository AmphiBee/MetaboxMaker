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
    public function readOnly(bool $readOnly = true): static
    {
        $this->settings['readonly'] = $readOnly;
        return $this;
    }

    public function disabled(bool $disabled = true): static
    {
        $this->settings['disabled'] = $disabled;

        return $this;
    }
}
