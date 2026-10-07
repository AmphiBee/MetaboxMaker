<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling image size settings in metabox fields.
 */
trait ImageSize
{
    /**
     * The image size to be displayed on the edit page.
     */
    protected string $image_size = 'thumbnail';

    /**
     * Set the image size used in the edit page.
     *
     * @param  string  $size  The image size.
     */
    public function imageSize(string $size): static
    {
        $this->image_size = $size;

        return $this;
    }
}
