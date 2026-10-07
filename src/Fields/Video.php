<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Video field: selects or uploads videos with the media library.
 */
class Video extends Media
{
    /**
     * The type of field.
     */
    protected string $type = 'video';
}
