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

use AmphiBee\MetaboxMaker\Fields\Settings\Inline;
use AmphiBee\MetaboxMaker\Fields\Settings\Multiple;
use AmphiBee\MetaboxMaker\Fields\Settings\Options;

/**
 * ButtonGroup field class for creating groups of button elements.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class ButtonGroup extends Field
{
    use Options, Inline, Multiple;

    /**
     * The type of input field. Set to 'button_group'.
     */
    protected string $type = 'button_group';
}
