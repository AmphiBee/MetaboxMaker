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

/**
 * FileInput field class for creating a simple text input for uploading a single file
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class FileInput extends Field
{
    /**
     * The type of input field. Set to 'file_input'.
     */
    protected string $type = 'file_input';
}
