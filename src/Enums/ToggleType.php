<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing how conditional logic shows and hides elements.
 */
enum ToggleType: string
{
    /**
     * Toggle the CSS display property: following fields move up.
     */
    case Display = 'display';

    /**
     * Toggle the CSS visibility property: hidden fields keep their space.
     */
    case Visibility = 'visibility';

    /**
     * Slide elements up and down.
     */
    case Slide = 'slide';

    /**
     * Fade elements in and out.
     */
    case Fade = 'fade';
}
