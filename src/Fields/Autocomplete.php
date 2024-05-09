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

use AmphiBee\MetaboxMaker\Fields\Settings\Options;
use AmphiBee\MetaboxMaker\Fields\Settings\Size;

/**
 * Autocomplete field class for creating input fields with autocomplete functionality.
 */
class Autocomplete extends Field
{
    /**
     * The type of input field. Set to 'autocomplete'.
     */
    protected string $type = 'autocomplete';

    use Options, Size;
}
