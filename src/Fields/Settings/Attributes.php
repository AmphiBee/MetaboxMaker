<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/MetaboxMaker
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
     * @param  array  $attributes  Attributes in 'key' => 'value' format.
     * @return $this
     */
    public function setAttributes(array $attributes): static
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
     * Set custom HTML attributes for the field, e.g. maxlength, pattern or data-* attributes.
     *
     * @param  array  $attributes  Attributes in 'key' => 'value' format.
     */
    public function attributes(array $attributes): static
    {
        return $this->setAttributes($attributes);
    }

    /**
     * Set a single custom HTML attribute for the field.
     */
    public function attribute(string $key, mixed $value): static
    {
        return $this->setAttributes([$key => $value]);
    }

    /**
     * Get all custom attributes.
     */
    public function getAttributes(): array
    {
        return $this->attributes ?? [];
    }
}
