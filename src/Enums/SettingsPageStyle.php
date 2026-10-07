<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the style of a settings page.
 */
enum SettingsPageStyle: string
{
    /**
     * Each meta box is displayed as a box, like on the post edit screen.
     */
    case Boxes = 'boxes';

    /**
     * Each meta box is a section, like on the WordPress settings pages.
     */
    case NoBoxes = 'no-boxes';
}
