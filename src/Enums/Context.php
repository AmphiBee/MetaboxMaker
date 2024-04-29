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

enum Context: string
{
    case Normal = 'normal';
    case Advanced = 'advanced';
    case Side = 'seamless';
    case FormTop = 'side';
    case AfterTitle = 'after_title';
    case AfterEditor = 'after_editor';
    case BeforePermalink = 'before_permalink';
}
