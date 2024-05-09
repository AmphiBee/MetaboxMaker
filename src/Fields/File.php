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
use AmphiBee\MetaboxMaker\Fields\Settings\UniqueFilenameCallback;
use AmphiBee\MetaboxMaker\Fields\Settings\UploadDir;

/**
 * File field class for handling file uploads.
 */
class File extends Field
{
    use ForceDelete, MaxFileUpload, UniqueFilenameCallback, UploadDir;

    /**
     * The type of field.
     */
    protected string $type = 'file';
}
