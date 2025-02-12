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
 * Trait for options.
 */
trait Options
{
    /**
     * Array of 'value' => 'Label' for the inputs or a URL for AJAX.
     */
    protected array|string $options;

    /**
     * Set the options for the inputs.
     *
     * @param  array|string  $options  Array of 'value' => 'Label' or URL for AJAX.
     * @return static Returns the instance of the class for method chaining.
     */
    public function options(array|string $options): static
    {
        $this->options = $options;
        return $this;
    }
}
