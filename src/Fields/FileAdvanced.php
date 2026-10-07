<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * File advanced field: selects or uploads files with the media library.
 */
class FileAdvanced extends Media
{
    /**
     * The type of field.
     */
    protected string $type = 'file_advanced';
}
