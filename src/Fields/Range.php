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
 * Range field class for creating rang input fields.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Range extends Text
{
    protected string $type = 'range';

    use RangeParams;
}
