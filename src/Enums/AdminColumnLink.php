<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing where an admin column value links to.
 */
enum AdminColumnLink: string
{
    /**
     * Link to the post edit screen.
     */
    case Edit = 'edit';

    /**
     * Link to the post on the front end.
     */
    case View = 'view';
}
