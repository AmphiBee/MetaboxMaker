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
 * Trait FieldAccess provides methods to set the readonly and disabled properties of a field.
 */
trait FieldAccess
{
    /**
     * @var bool Indicates whether the field is read-only.
     */
    protected bool $readonly;

    /**
     * @var bool Indicates whether the field is disabled.
     */
    protected bool $disabled;

    /**
     * Sets the field as read-only.
     *
     * @param bool $readOnly Defaults to true.
     * @return static Returns the instance of the class for method chaining.
     */
    public function readOnly(bool $readOnly = true): static
    {
        $this->readonly = $readOnly;

        return $this;
    }

    /**
     * Sets the field as disabled.
     *
     * @param bool $disabled Defaults to true.
     * @return static Returns the instance of the class for method chaining.
     */
    public function disabled(bool $disabled = true): static
    {
        $this->disabled = $disabled;

        return $this;
    }
}
