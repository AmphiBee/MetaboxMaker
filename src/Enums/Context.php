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
 * Enum representing different contexts for metaboxes.
 */
enum Context: string
{
    /**
     * Normal context for a metabox.
     *
     * @var string Normal
     */
    case Normal = 'normal';

    /**
     * Advanced context for a metabox.
     *
     * @var string Advanced
     */
    case Advanced = 'advanced';

    /**
     * Side context for a metabox.
     *
     * @var string
     */
    case Side = 'seamless';

    /**
     * Form top context for a metabox.
     *
     * @var string
     */
    case FormTop = 'side';

    /**
     * After title context for a metabox.
     *
     * @var string
     */
    case AfterTitle = 'after_title';

    /**
     * After editor context for a metabox.
     *
     * @var string
     */
    case AfterEditor = 'after_editor';

    /**
     * Before permalink context for a metabox.
     *
     * @var string
     */
    case BeforePermalink = 'before_permalink';
}
