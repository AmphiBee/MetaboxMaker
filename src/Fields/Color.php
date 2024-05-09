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

namespace AmphiBee\MetaboxMaker\Fields;

use AmphiBee\MetaboxMaker\Fields\Settings\JsOptions;

/**
 * Color field class for creating color picker elements.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
final class Color extends Field
{
    use JsOptions;

    /**
     * The type of input field. Set to 'color'.
     */
    protected string $type = 'color';

    /**
     * Whether to allow opacity in the color picker.
     */
    protected bool $alpha_channel;

    /**
     * Set whether to allow opacity in the color picker.
     */
    public function alphaChannel(bool $alpha_channel = true): static
    {
        $this->alpha_channel = $alpha_channel;
        return $this;
    }
}
