<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\GeoBinding;
use Pollora\Metabox\Fields\Settings\InputTooltip;
use Pollora\Metabox\Fields\Settings\JsOptions;
use Pollora\Metabox\Fields\Settings\Multiple;
use Pollora\Metabox\Fields\Settings\Options;
use Pollora\Metabox\Fields\Settings\ToggleAll;

/**
 * SelectAdvanced field class for creating enhanced select input fields using Select2.
 */
class SelectAdvanced extends Field
{
    use GeoBinding;
    use InputTooltip;
    use JsOptions, Multiple, Options, ToggleAll;

    /**
     * The type of input field. Defaults to 'select_advanced'.
     */
    protected string $type = 'select_advanced';
}
