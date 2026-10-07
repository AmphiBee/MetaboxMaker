<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the priority levels.
 */
enum Priority: string
{
    /**
     * High priority level.
     */
    case High = 'high';

    /**
     * Low priority level.
     */
    case Low = 'low';
}
