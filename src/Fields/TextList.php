<?php

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

use AmphiBee\MetaboxMaker\Fields\Settings\Clonable;
use AmphiBee\MetaboxMaker\Fields\Settings\Options;

/**
 * TextList field class for creating a list of text inputs.
 */
class TextList extends Field
{
    use Options;

    /**
     * The type of input field. Set to 'text_list'.
     */
    protected string $type = 'text_list';
} 