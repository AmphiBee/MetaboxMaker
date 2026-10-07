<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/MetaboxMaker
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Enums;

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
