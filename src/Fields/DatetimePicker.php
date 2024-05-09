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

use AmphiBee\MetaboxMaker\Fields\Settings\DateParams;
use AmphiBee\MetaboxMaker\Fields\Settings\Inline;
use AmphiBee\MetaboxMaker\Fields\Settings\JsOptions;
use AmphiBee\MetaboxMaker\Fields\Settings\Size;

/**
 * Date field class for creating date input fields with optional date picker enhancements.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class DatetimePicker extends Field
{
    /**
     * The type of input field. Set to 'date'.
     */
    protected string $type = 'datetime';

    use Size, Inline, JsOptions, DateParams;
}
