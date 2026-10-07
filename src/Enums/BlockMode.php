<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the default mode of a block.
 */
enum BlockMode: string
{
    /**
     * Show the edit fields when the block is loaded.
     */
    case Edit = 'edit';

    /**
     * Show the rendered block when it is loaded.
     */
    case Preview = 'preview';
}
