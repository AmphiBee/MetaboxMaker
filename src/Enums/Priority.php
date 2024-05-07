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
 *
 * @package AmphiBee\MetaboxMaker\Enums
 */
enum Priority: string
{
    /**
     * High priority level.
     *
     * @var string High
     */
    case High = 'high';

    /**
     * Low priority level.
     *
     * @var string Low
     */
    case Low = 'low';
}
