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

use AmphiBee\MetaboxMaker\Fields\Settings\Multiple;
use AmphiBee\MetaboxMaker\Fields\Settings\Options;

/**
 * ImageSelect field class for creating image selection fields.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class ImageSelect extends Field
{
    /**
     * The type of the field.
     */
    protected string $type = 'image_select';

    use Options, Multiple;
}
