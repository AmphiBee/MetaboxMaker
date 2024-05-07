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
 * Trait for clonable fields.
 */
trait Clonable
{
    /**
     * @var bool $clone Defaults to false.
     */
    protected bool $clone = false;

    /**
     * @var bool $clone_default Defaults to false.
     */
    protected bool $clone_default = false;

    /**
     * @var bool $clone_as_multiple Defaults to false.
     */
    protected bool $clone_as_multiple = false;

    /**
     * @var ?int $max_clone Defaults to null.
     */
    protected ?int $max_clone = null;

    /**
     * @var ?int $min_clone Defaults to null.
     */
    protected ?int $min_clone = null;

    /**
     * @var ?string $add_button Defaults to null.
     */
    protected ?string $add_button = null;

    /**
     * Indicates whether the field can be cloned.
     *
     * @param bool $clone Defaults to true.
     * @return static
     */
    public function cloneable(bool $clone = true): static
    {
        $this->clone = $clone;

        return $this;
    }

    /**
     * Indicates whether the field should clone its default values.
     *
     * @param bool $cloneDefault Defaults to true.
     * @return static
     */
    public function cloneDefaults(bool $cloneDefault = true): static
    {
        $this->clone_default = $cloneDefault;

        return $this;
    }

    /**
     * Indicates whether the field should clone as multiple instances.
     *
     * @param bool $cloneAsMultiple Defaults to true.
     * @return static
     */
    public function cloneAsMultiple(bool $cloneAsMultiple = true): static
    {
        $this->clone_as_multiple = $cloneAsMultiple;

        return $this;
    }

    /**
     * Sets the maximum number of clones allowed.
     *
     * @param int $maxClone
     * @return static
     */
    public function maxClones(int $maxClone): static
    {
        $this->max_clone = $maxClone;

        return $this;
    }

    /**
     * Sets the minimum number of clones allowed.
     *
     * @param int $minClone
     * @return static
     */
    public function minClones(int $minClone): static
    {
        $this->min_clone = $minClone;

        return $this;
    }

    /**
     * Sets the text for the clone button.
     *
     * @param string $addButton
     * @return static
     */
    public function addButton(string $addButton): static
    {
        $this->add_button = $addButton;

        return $this;
    }
}
