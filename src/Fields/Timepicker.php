<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\AutocompleteAttribute;
use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\InputTooltip;
use Pollora\Metabox\Fields\Settings\Size;
use Pollora\Metabox\Fields\Settings\TimepickerOptions;

/**
 * Timepicker field class for creating time input fields with enhanced jQuery UI timepicker functionalities.
 */
class Timepicker extends Field
{
    use AutocompleteAttribute;
    use Inline, Size, TimepickerOptions;
    use InputTooltip;

    /**
     * The type of input field. Set to 'time'.
     */
    protected string $type = 'time';
}
