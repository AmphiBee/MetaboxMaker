<?php
/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/metabox-builder
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields\Settings;

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
