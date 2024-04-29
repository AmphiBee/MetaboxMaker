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
    protected bool $clone = false;

    protected bool $clone_default = false;

    protected bool $clone_as_multiple = false;

    protected ?int $max_clone = null;

    protected ?int $min_clone = null;

    protected ?string $add_button = null;

    public function cloneable(bool $clone = true): static
    {
        $this->clone = $clone;

        return $this;
    }

    public function cloneDefaults(bool $cloneDefault = true): static
    {
        $this->clone_default = $cloneDefault;

        return $this;
    }

    public function cloneAsMultiple(bool $cloneAsMultiple = true): static
    {
        $this->clone_as_multiple = $cloneAsMultiple;

        return $this;
    }

    public function maxClones(int $maxClone): static
    {
        $this->max_clone = $maxClone;

        return $this;
    }

    public function minClones(int $minClone): static
    {
        $this->min_clone = $minClone;

        return $this;
    }

    public function addButton(string $addButton): static
    {
        $this->add_button = $addButton;

        return $this;
    }
}
