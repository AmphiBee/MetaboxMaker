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

use AmphiBee\MetaboxMaker\Fields\Settings\Attributes;

/**
 * Button field class for creating button elements.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Button extends Field
{
    use Attributes;

    /**
     * The type of input field. Set to 'button'.
     */
    protected string $type = 'button';
}
