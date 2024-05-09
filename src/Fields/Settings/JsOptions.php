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

use AmphiBee\MetaboxMaker\Validation\ColorValidation;

/**
 * Trait to add js options to fields.
 */
trait JsOptions
{
    /**
     * JavaScript options for the field.
     */
    protected array $js_options;

    /**
     * Set JavaScript options for the field.
     *
     * @param  array  $js_options  JavaScript options.
     * @return static Returns the instance of the field class for method chaining.
     */
    public function jsOptions(array $js_options): static
    {

        if (isset($js_options['palettes'])) {
            foreach ($js_options['palettes'] as $color) {
                ColorValidation::ensureIsColor($color);
            }
        }

        $this->js_options = $js_options;

        return $this;
    }
}
