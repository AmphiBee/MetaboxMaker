<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ImageSize;

/**
 * Image field: a classic file input for images, without the media library.
 */
class Image extends File
{
    use ImageSize;

    /**
     * The type of field.
     */
    protected string $type = 'image';
}
