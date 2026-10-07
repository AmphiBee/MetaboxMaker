<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Options;

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
