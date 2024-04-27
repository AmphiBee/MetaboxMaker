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

trait Clonable
{
    public function cloneable(bool $clone = true): static
    {
        $this->settings['clone'] = $clone;
        return $this;
    }

    public function cloneDefaults(bool $cloneDefault = true): static
    {
        $this->settings['clone_default'] = $cloneDefault;
        return $this;
    }

    public function cloneAsMultiple(bool $cloneAsMultiple = true): static
    {
        $this->settings['clone_as_multiple'] = $cloneAsMultiple;
        return $this;
    }

    public function maxClones(int $maxClone): static
    {
        $this->settings['max_clone'] = $maxClone;
        return $this;
    }

    public function minClones(int $minClone): static
    {
        $this->settings['min_clone'] = $minClone;
        return $this;
    }

    public function addButton(string $addButton): static
    {
        $this->settings['add_button'] = $addButton;
        return $this;
    }
}
