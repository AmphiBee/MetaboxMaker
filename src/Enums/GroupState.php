<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the state of a group in a metabox.
 */
enum GroupState: string
{
    /**
     * The group is collapsed and hidden.
     */
    case Collapsed = 'collapsed';

    /**
     * The group is expanded and visible.
     */
    case Expanded = 'expanded';
}
