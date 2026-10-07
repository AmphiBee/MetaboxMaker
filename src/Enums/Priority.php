<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/metabox-builder
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Enums;

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
