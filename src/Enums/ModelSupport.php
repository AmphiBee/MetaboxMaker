<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing the data a custom model fills automatically (MB Custom Table).
 */
enum ModelSupport: string
{
    case Author = 'author';
    case PublishedDate = 'published_date';
    case ModifiedDate = 'modified_date';
}
