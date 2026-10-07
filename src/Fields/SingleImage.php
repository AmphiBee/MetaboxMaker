<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Single image field: selects one image with the media library.
 */
class SingleImage extends ImageAdvanced
{
    /**
     * The type of field.
     */
    protected string $type = 'single_image';
}
