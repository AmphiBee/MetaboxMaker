<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ForceDelete;
use Pollora\Metabox\Fields\Settings\ImageSize;

/**
 * SingleImage field class for handling single image uploads.
 */
class SingleImage extends Image
{
    use ForceDelete, ImageSize;

    /**
     * The type of field.
     */
    protected string $type = 'single_image';
}
