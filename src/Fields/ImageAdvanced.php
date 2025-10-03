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

namespace AmphiBee\MetaboxMaker\Fields;

use AmphiBee\MetaboxMaker\Fields\Settings\ImageSize;
use AmphiBee\MetaboxMaker\Fields\Settings\MaxStatus;

/**
 * Image advanced field class for handling advanced image uploads.
 */
/**
 * ImageAdvanced field class for handling more advanced image upload scenarios.
 */
class ImageAdvanced extends Image
{
    use ImageSize, MaxStatus;

    /**
     * The type of field.
     */
    protected string $type = 'image_advanced';

    /**
     * Placement of new images in the list.
     */
    protected string $add_to = 'end';

    /**
     * Set the placement of new images.
     *
     * @param  string  $position  'beginning' or 'end'.
     */
    public function newImagePlacement(string $position): static
    {
        $this->add_to = $position;

        return $this;
    }
}
