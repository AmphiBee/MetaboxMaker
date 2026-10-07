<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Options;
use Pollora\Metabox\Fields\Settings\Size;

/**
 * Autocomplete field class for creating input fields with autocomplete functionality.
 */
class Autocomplete extends Field
{
    use Options, Size;

    /**
     * The type of input field. Set to 'autocomplete'.
     */
    protected string $type = 'autocomplete';
}
