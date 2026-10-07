<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ForceDelete;
use Pollora\Metabox\Fields\Settings\MaxFileUpload;
use Pollora\Metabox\Fields\Settings\MaxStatus;
use Pollora\Metabox\Fields\Settings\MimeType;

/**
 * FileAdvanced field class for handling file uploads.
 */
class FileAdvanced extends Field
{
    use ForceDelete, MaxFileUpload, MaxStatus, MimeType;

    /**
     * The type of field.
     */
    protected string $type = 'file_advanced';
}
