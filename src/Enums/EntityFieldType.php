<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing different types of post fields.
 */
enum EntityFieldType: string
{
    /**
     * Represents a select field type.
     */
    case SELECT = 'select';

    /**
     * Represents a select field type with advanced options.
     */
    case SELECT_ADVANCED = 'select_advanced';

    /**
     * Represents a select field type with tree-like options.
     */
    case SELECT_TREE = 'select_tree';

    /**
     * Represents a checkbox list field type.
     */
    case CHECKBOX_LIST = 'checkbox_list';

    /**
     * Represents a checkbox tree field type.
     */
    case CHECKBOX_TREE = 'checkbox_tree';

    /**
     * Represents a radio list field type.
     */
    case RADIO_LIST = 'radio_list';
}
