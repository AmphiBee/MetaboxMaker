<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\Size;
use Pollora\Metabox\Fields\Settings\TimepickerOptions;

/**
 * Timepicker field class for creating time input fields with enhanced jQuery UI timepicker functionalities.
 */
class Timepicker extends Field
{
    use Inline, Size, TimepickerOptions;

    /**
     * The type of input field. Set to 'time'.
     */
    protected string $type = 'time';
}
