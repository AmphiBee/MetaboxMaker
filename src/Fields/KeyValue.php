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
 * KeyValue field class for creating inputs that accept key-value pairs.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class KeyValue extends Field
{
    /**
     * The type of input field. Set to 'key_value'.
     */
    protected string $type = 'key_value';
}
