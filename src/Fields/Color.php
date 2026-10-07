<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\JsOptions;

/**
 * Color field class for creating color picker elements.
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
