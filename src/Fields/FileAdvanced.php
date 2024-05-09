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
 * FileAdvanced field class for handling file uploads.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class FileAdvanced extends Field
{
    /**
     * The type of field.
     */
    protected string $type = 'file_advanced';

    /**
     * The maximum number of file uploads allowed.
     */
    protected ?int $max_file_uploads = null;

    /**
     * Whether to force deletion of existing files.
     */
    protected bool $force_delete = false;

    /**
     * The allowed MIME types for uploaded files.
     *
     * @var array|null The array of MIME types.
     */
    protected ?array $mime_types = null;

    /**
     * Whether to show the "max" status.
     *
     * @var bool Whether to show the "max" status. Default is true.
     */
    protected bool $max_status;

    /**
     * Set the maximum number of file uploads allowed.
     *
     * @param int $max The maximum number of file uploads.
     */
    public function maxFileUploads(int $max): static
    {
        $this->max_file_uploads = $max;
        return $this;
    }

    /**
     * Set whether to force deletion of existing files.
     *
     * @param bool $force Whether to force deletion.
     */
    public function forceDelete(bool $force = true): static
    {
        $this->force_delete = $force;
        return $this;
    }

    /**
     * Set the allowed MIME types for uploaded files.
     *
     * @param array $types An array of MIME types.
     */
    public function mimeTypes(array $types): static
    {
        $this->mime_types = $types;
        return $this;
    }

    /**
     * Set whether to show the "max" status.
     *
     * @param bool $show Whether to show the "max" status.
     */
    public function showMaxStatus(bool $show = true): static
    {
        $this->max_status = $show;
        return $this;
    }
}
