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
 * Trait for setting default values for fields.
 */
trait DefaultValue
{
    /**
     * The default value for the field.
     */
    protected mixed $std;

    /**
     * Set the default value for the field.
     *
     * @param  mixed  $value  The default value to set.
     * @return static The instance of the field with the default value set.
     */
    public function default(mixed $value): static
    {
        $this->std = $value;

        return $this;
    }
}
