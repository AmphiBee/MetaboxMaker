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

/**
 * Hidden field class for creating a hidden field.
 */
class Hidden extends Field
{
    /**
     * The type of input field. Set to 'hidden'.
     */
    protected string $type = 'hidden';
}
