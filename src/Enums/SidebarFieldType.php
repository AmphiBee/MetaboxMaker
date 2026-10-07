<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing different types of sidebar fields.
 */
enum SidebarFieldType: string
{
    /**
     * Represents a select field in the sidebar.
     */
    case SELECT = 'select';

    /**
     * Represents an advanced select field in the sidebar.
     */
    case SELECT_ADVANCED = 'select_advanced';

    /**
     * Represents a checkbox list field in the sidebar.
     */
    case CHECKBOX_LIST = 'checkbox_list';

    /**
     * Represents a radio list field in the sidebar.
     */
    case RADIO_LIST = 'radio_list';
}
