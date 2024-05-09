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

use AmphiBee\MetaboxMaker\Fields\Settings\ForceDelete;
use AmphiBee\MetaboxMaker\Fields\Settings\MaxFileSize;
use AmphiBee\MetaboxMaker\Fields\Settings\MaxFileUpload;

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
