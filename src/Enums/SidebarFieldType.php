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
 * Enum representing different types of sidebar fields.
 */
enum SidebarFieldType: string
{
    /**
     * Represents a select field in the sidebar.
     *
     * @var string
     */
    case SELECT = 'select';

    /**
     * Represents an advanced select field in the sidebar.
     *
     * @var string
     */
    case SELECT_ADVANCED = 'select_advanced';

    /**
     * Represents a checkbox list field in the sidebar.
     *
     * @var string
     */
    case CHECKBOX_LIST = 'checkbox_list';

    /**
     * Represents a radio list field in the sidebar.
     *
     * @var string
     */
    case RADIO_LIST = 'radio_list';
}
