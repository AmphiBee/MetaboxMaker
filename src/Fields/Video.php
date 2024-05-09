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
use AmphiBee\MetaboxMaker\Fields\Settings\MaxFileUpload;
use AmphiBee\MetaboxMaker\Fields\Settings\MaxStatus;

/**
 * Video field class for handling video uploads.
 */
class Video extends Field
{
    use ForceDelete, MaxFileUpload, MaxStatus;

    /**
     * The type of field.
     */
    protected string $type = 'video';
}
