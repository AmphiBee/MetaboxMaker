<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ForceDelete;
use Pollora\Metabox\Fields\Settings\MaxFileSize;
use Pollora\Metabox\Fields\Settings\MaxFileUpload;

/**
 * ImageUpload field class for handling advanced image upload scenarios with detailed control.
 */
class ImageUpload extends ImageAdvanced
{
    use ForceDelete, MaxFileSize, MaxFileUpload;

    /**
     * The type of field.
     */
    protected string $type = 'image_upload';
}
