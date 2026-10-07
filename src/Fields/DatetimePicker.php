<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\DateParams;
use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\JsOptions;
use Pollora\Metabox\Fields\Settings\Size;

/**
 * Date field class for creating date input fields with optional date picker enhancements.
 */
class DatetimePicker extends Field
{
    use DateParams, Inline, JsOptions, Size;

    /**
     * The type of input field. Set to 'date'.
     */
    protected string $type = 'datetime';
}
