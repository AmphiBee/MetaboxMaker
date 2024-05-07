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
     *
     * @var string|null
     */
    protected ?string $placeholder = null;

    /**
     * Set the placeholder text for the field.
     *
     * @param string $placeholder The placeholder text.
     *
     * @return static The instance of the class with the updated placeholder.
     */
    public function placeholder(string $placeholder): static
    {
        $this->placeholder = $placeholder;

        return $this;
    }
}
