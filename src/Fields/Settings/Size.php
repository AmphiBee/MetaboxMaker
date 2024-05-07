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
 * Trait for setting the size of a field.
 */
trait Size
{
    /**
     * The size of the field.
     *
     * @var string|null
     */
    protected ?string $size = null;

    /**
     * Set the size of the field.
     *
     * @param string $size The size of the field.
     *
     * @return static The instance of the class with the updated size.
     */
    public function size(string $size): static
    {
        $this->size = $size;

        return $this;
    }
}
