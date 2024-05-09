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
 * Enum representing the state of a group in a metabox.
 */
enum GroupState: string
{
    /**
     * The group is collapsed and hidden.
     *
     * @var string Collapsed
     */
    case Collapsed = 'collapsed';

    /**
     * The group is expanded and visible.
     *
     * @var string Expanded
     */
    case Expanded = 'expanded';
}
