<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ForceDelete;
use Pollora\Metabox\Fields\Settings\MaxFileUpload;
use Pollora\Metabox\Fields\Settings\UniqueFilenameCallback;
use Pollora\Metabox\Fields\Settings\UploadDir;

/**
 * File field class for handling file uploads.
 */
class File extends Field
{
    use ForceDelete, MaxFileUpload, UniqueFilenameCallback, UploadDir;

    /**
     * The type of field.
     */
    protected string $type = 'file';
}
