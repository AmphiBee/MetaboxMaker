<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\MaxFileSize;

/**
 * FileAdvanced field class for handling file uploads.
 */
class FileUpload extends FileAdvanced
{
    use MaxFileSize;

    /**
     * The type of field.
     */
    protected string $type = 'file_upload';
}
