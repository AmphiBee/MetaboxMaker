<?php

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

use AmphiBee\MetaboxMaker\Fields\Settings\Options;

/**
 * FieldsetText field class for creating a set of text inputs.
 */
class FieldsetText extends Field
{
    use Options;

    /**
     * The type of input field. Set to 'fieldset_text'.
     */
    protected string $type = 'fieldset_text';
} 