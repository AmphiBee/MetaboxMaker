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

use AmphiBee\MetaboxMaker\Fields\Settings\Size;

/**
 * Password field class for creating secure password input fields.
 */
class Password extends Field
{
    use Size;

    /**
     * The type of input field. Set to 'password'.
     */
    protected string $type = 'password';
}
