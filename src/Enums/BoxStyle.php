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
 * Enum representing different box styles.
 *
 * @package AmphiBee\MetaboxMaker\Enums
 */
enum BoxStyle: string
{
    /**
     * Default box style.
     *
     * @var string Default
     */
    case Default = 'default';

    /**
     * Seamless box style.
     *
     * @var string Seamless
     */
    case Seamless = 'seamless';
}
