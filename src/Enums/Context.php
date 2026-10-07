<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing different contexts for metaboxes.
 */
enum Context: string
{
    /**
     * Normal context for a metabox.
     */
    case Normal = 'normal';

    /**
     * Advanced context for a metabox.
     */
    case Advanced = 'advanced';

    /**
     * Side context for a metabox.
     */
    case Side = 'side';

    /**
     * Form top context for a metabox.
     */
    case FormTop = 'form_top';

    /**
     * After title context for a metabox.
     */
    case AfterTitle = 'after_title';

    /**
     * After editor context for a metabox.
     */
    case AfterEditor = 'after_editor';

    /**
     * Before permalink context for a metabox.
     */
    case BeforePermalink = 'before_permalink';
}
