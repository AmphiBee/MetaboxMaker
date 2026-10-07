<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\MaxFileSize;

/**
 * Image upload field: a drag and drop area uploading images to the media library.
 */
class ImageUpload extends ImageAdvanced
{
    use MaxFileSize;

    /**
     * The type of field.
     */
    protected string $type = 'image_upload';
}
