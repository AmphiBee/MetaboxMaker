<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Image field class for handling image uploads.
 */
class Image extends File
{
    /**
     * The type of field.
     */
    protected string $type = 'image';
}
