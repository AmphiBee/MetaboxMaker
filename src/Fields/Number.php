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

use AmphiBee\MetaboxMaker\Fields\Settings\RangeParams;

/**
 * Number field class for creating number input fields.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Number extends Text
{
    protected string $type = 'number';

    use RangeParams;
}
