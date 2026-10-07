<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\AutocompleteAttribute;
use Pollora\Metabox\Fields\Settings\DateParams;
use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\InputTooltip;
use Pollora\Metabox\Fields\Settings\JsOptions;
use Pollora\Metabox\Fields\Settings\Size;

/**
 * Date field class for creating date input fields with optional date picker enhancements.
 */
class DatetimePicker extends Field
{
    use AutocompleteAttribute;
    use DateParams, Inline, JsOptions, Size;
    use InputTooltip;

    /**
     * The type of input field. Set to 'date'.
     */
    protected string $type = 'datetime';

    /**
     * Set the displayed time format, in the jQuery UI Timepicker format, e.g. 'HH:mm:ss'.
     * Defaults to 'HH:mm'.
     */
    public function timeFormat(string $format): static
    {
        $this->js_options['timeFormat'] = $format;

        return $this;
    }
}
