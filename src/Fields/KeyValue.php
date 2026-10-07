<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Placeholder;

/**
 * KeyValue field class for creating key-value pair inputs.
 */
class KeyValue extends Field
{
    use Placeholder;

    /**
     * The type of input field. Set to 'key_value'.
     */
    protected string $type = 'key_value';
}
