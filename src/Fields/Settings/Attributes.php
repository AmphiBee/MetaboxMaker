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
 * Trait to handle custom HTML5 attributes for form fields.
 */
trait Attributes
{
    /**
     * Array of custom HTML5 attributes.
     */
    protected array $attributes;

    /**
     * Set custom HTML5 attributes for the field.
     *
     * @param array $attributes Attributes in 'key' => 'value' format.
     * @return $this
     */
    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $key => $value) {
            if (is_array($value)) {
                $this->attributes[$key] = json_encode($value);
            } else {
                $this->attributes[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * Get all custom attributes.
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
