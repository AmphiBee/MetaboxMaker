<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ImageSize;

/**
 * Image advanced field: selects or uploads images with the media library.
 */
class ImageAdvanced extends Media
{
    use ImageSize;

    /**
     * The type of field.
     */
    protected string $type = 'image_advanced';
}
