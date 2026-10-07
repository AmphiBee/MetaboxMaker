<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the toolbar position of a block editor field.
 */
enum ToolbarPosition: string
{
    /**
     * Toolbar fixed at the top of the editor.
     */
    case Top = 'top';

    /**
     * Toolbar displayed above the selected block.
     */
    case Contextual = 'contextual';
}
