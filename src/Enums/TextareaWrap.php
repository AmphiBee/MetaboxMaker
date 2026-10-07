<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing how a textarea wraps its text when the form is submitted.
 */
enum TextareaWrap: string
{
    case Soft = 'soft';
    case Hard = 'hard';
    case Off = 'off';
}
