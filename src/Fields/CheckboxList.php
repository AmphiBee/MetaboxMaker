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

use AmphiBee\MetaboxMaker\Fields\Settings\ToggleAll;

/**
 * CheckboxList field class for creating a list of checkboxes.
 */
class CheckboxList extends Radio
{
    /**
     * The type of input field. Defaults to 'checkbox_list'.
     */
    protected string $type = 'checkbox_list';

    use ToggleAll;
}
