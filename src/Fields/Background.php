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
 * Background field class for creating a field used to set background properties in a UI.
 */
class Background extends Field
{
    /**
     * The type of input field. Set to 'background'.
     */
    protected string $type = 'background';
}
