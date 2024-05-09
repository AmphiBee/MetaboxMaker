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
 * Slider field class for creating slider input fields using jQuery UI.
 */
final class Slider extends Field
{
    use JsOptions;

    /**
     * The type of input field. Set to 'slider'.
     */
    protected string $type = 'slider';

    /**
     * Text prefix displayed before the value.
     */
    protected string $prefix;

    /**
     * Text suffix displayed after the value.
     */
    protected string $suffix;

    public function __construct(string $name, string $id)
    {
        parent::__construct($name, $id);
        $this->js_options = [
            'range' => 'min',
            'value' => 0,
        ];
    }

    /**
     * Set the prefix text for the slider value.
     */
    public function prefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Set the suffix text for the slider value.
     */
    public function suffix(string $suffix): static
    {
        $this->suffix = $suffix;

        return $this;
    }

    public function minValue(int $min): static
    {
        $this->js_options['min'] = $min;

        return $this;
    }

    public function maxValue(int $max): static
    {
        $this->js_options['max'] = $max;

        return $this;
    }

    public function stepValue(int $step): static
    {
        $this->js_options['step'] = $step;

        return $this;
    }

    public function startValue(int $value): static
    {
        $this->js_options['value'] = $value;

        return $this;
    }

    public function range(bool $range = true): static
    {
        $this->js_options['range'] = $range ? true : 'min';

        return $this;
    }
}
