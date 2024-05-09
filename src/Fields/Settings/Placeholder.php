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
 * Trait for setting a placeholder for a field.
 */
trait Placeholder
{
    /**
     * The placeholder text for the field.
     */
    protected string|array $placeholder;

    /**
     * Set the placeholder text for the field.
     *
     * @param string|array $placeholder The placeholder text. Array with 'key' and 'value' as keys and placeholder text as values for the KeyValye field.
     *
     * @return static The instance of the class with the updated placeholder.
     */
    public function placeholder(string|array $placeholder): static
    {
        $this->placeholder = $placeholder;

        return $this;
    }
}
