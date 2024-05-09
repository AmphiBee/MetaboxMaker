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

/**
 * Switch field class for creating toggle switches in forms.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Switcher extends Field
{
    /**
     * The type of input field. Set to 'switch'.
     */
    protected string $type = 'switch';

    /**
     * The style of the switch. Can be 'rounded' or 'square'.
     */
    protected string $style = 'rounded';

    /**
     * The label for "On" status.
     */
    protected ?string $on_label = null;

    /**
     * The label for "Off" status.
     */
    protected ?string $off_label = null;

    /**
     * Set the style of the switch.
     *
     * @param string $style The style of the switch ('rounded' or 'square').
     */
    public function style(string $style): static
    {
        $this->style = $style;
        return $this;
    }

    /**
     * Set the custom "On" label.
     *
     * @param string $on_label The label for the "On" status.
     */
    public function onLabel(string $on_label): static
    {
        $this->on_label = $on_label;
        return $this;
    }

    /**
     * Set the custom "Off" label.
     *
     * @param string $off_label The label for the "Off" status.
     */
    public function offLabel(string $off_label): static
    {
        $this->off_label = $off_label;
        return $this;
    }

}
