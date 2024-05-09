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

namespace AmphiBee\MetaboxMaker\Enums;

/**
 * Enum representing different types of post fields.
 *
 * @package AmphiBee\MetaboxMaker\Enums
 */
enum EntityFieldType: string
{
    /**
     * Represents a select field type.
     *
     * @var string
     */
    case SELECT = 'select';

    /**
     * Represents a select field type with advanced options.
     *
     * @var string
     */
    case SELECT_ADVANCED = 'select_advanced';

    /**
     * Represents a select field type with tree-like options.
     *
     * @var string
     */
    case SELECT_TREE = 'select_tree';

    /**
     * Represents a checkbox list field type.
     *
     * @var string
     */
    case CHECKBOX_LIST = 'checkbox_list';

    /**
     * Represents a checkbox tree field type.
     *
     * @var string
     */
    case CHECKBOX_TREE = 'checkbox_tree';

    /**
     * Represents a radio list field type.
     *
     * @var string
     */
    case RADIO_LIST = 'radio_list';
}
