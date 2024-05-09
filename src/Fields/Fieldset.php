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
 * Fieldset field class for grouping multiple input fields.
 */
class Fieldset extends Field
{
    /**
     * The type of input field. Set to 'fieldset'.
     */
    protected string $type = 'fieldset';

    /**
     * Array of 'value' => 'Label' for the inputs.
     */
    protected array $options;

    /**
     * Set the input fields for the fieldset.
     *
     * @param  array  $options  Array of 'key' => 'Input Label' pairs.
     */
    public function inputs(array $options): static
    {
        $this->options = $options;

        return $this;
    }
}
