<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\DateParams;
use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\JsOptions;
use Pollora\Metabox\Fields\Settings\Size;

/**
 * DatePicker field class for creating date input fields with a date picker.
 */
class Datepicker extends Field
{
    use DateParams, Inline, JsOptions, Size;

    /**
     * The type of input field. Set to 'date'.
     */
    protected string $type = 'date';
}
