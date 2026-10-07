<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/MetaboxMaker
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * Button field class for creating button elements.
 */
class Button extends Field
{
    /**
     * The type of input field. Set to 'button'.
     */
    protected string $type = 'button';
}
