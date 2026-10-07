<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/MetaboxMaker
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * Fieldset field class for grouping multiple text inputs.
 *
 * Meta Box has no 'fieldset' type: this is a fieldset_text field.
 *
 * @deprecated Use FieldsetText instead.
 */
class Fieldset extends FieldsetText
{
    /**
     * Set the input fields for the fieldset.
     *
     * @param  array  $options  Array of 'key' => 'Input Label' pairs.
     */
    public function inputs(array $options): static
    {
        return $this->options($options);
    }
}
