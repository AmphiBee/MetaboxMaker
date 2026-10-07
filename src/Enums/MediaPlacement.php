<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing where new files are added in a media field.
 */
enum MediaPlacement: string
{
    case Beginning = 'beginning';
    case End = 'end';
}
