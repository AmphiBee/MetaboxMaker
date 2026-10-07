<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\MaxFileSize;

/**
 * File upload field: a drag and drop area uploading files to the media library.
 */
class FileUpload extends FileAdvanced
{
    use MaxFileSize;

    /**
     * The type of field.
     */
    protected string $type = 'file_upload';
}
