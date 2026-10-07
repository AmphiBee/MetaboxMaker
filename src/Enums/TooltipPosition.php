<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the position of a field tooltip.
 */
enum TooltipPosition: string
{
    case Top = 'top';
    case Bottom = 'bottom';
    case Left = 'left';
    case Right = 'right';
}
