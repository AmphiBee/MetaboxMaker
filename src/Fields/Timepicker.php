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

use AmphiBee\MetaboxMaker\Fields\Settings\Inline;
use AmphiBee\MetaboxMaker\Fields\Settings\Size;
use AmphiBee\MetaboxMaker\Fields\Settings\TimepickerOptions;

/**
 * Timepicker field class for creating time input fields with enhanced jQuery UI timepicker functionalities.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Timepicker extends Field
{
    use TimepickerOptions, Inline, Size;

    /**
     * The type of input field. Set to 'time'.
     */
    protected string $type = 'time';
}
