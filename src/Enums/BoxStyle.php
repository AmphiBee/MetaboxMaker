<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing different box styles.
 */
enum BoxStyle: string
{
    /**
     * Default box style.
     */
    case Default = 'default';

    /**
     * Seamless box style.
     */
    case Seamless = 'seamless';
}
