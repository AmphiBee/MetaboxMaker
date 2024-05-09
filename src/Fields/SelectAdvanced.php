<?php
/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/metabox-builder
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

use AmphiBee\MetaboxMaker\Fields\Settings\JsOptions;
use AmphiBee\MetaboxMaker\Fields\Settings\Multiple;
use AmphiBee\MetaboxMaker\Fields\Settings\Options;
use AmphiBee\MetaboxMaker\Fields\Settings\ToggleAll;

/**
 * SelectAdvanced field class for creating enhanced select input fields using Select2.
 */
class SelectAdvanced extends Field
{
    /**
     * The type of input field. Defaults to 'select_advanced'.
     */
    protected string $type = 'select_advanced';

    use JsOptions, Multiple, Options, ToggleAll;
}
