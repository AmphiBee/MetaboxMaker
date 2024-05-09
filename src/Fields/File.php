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
 * File field class for handling file uploads.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class File extends Field
{
    /**
     * The type of field.
     */
    protected string $type = 'file';

    /**
     * The maximum number of file uploads allowed.
     */
    protected int $max_file_uploads;

    /**
     * Whether to force deletion of existing files.
     */
    protected bool $force_delete = false;

    /**
     * The directory where files will be uploaded.
     */
    protected string $upload_dir;

    /**
     * A callback function to generate a unique filename for uploaded files.
     *
     * @var callable
     */
    protected $unique_filename_callback;

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
     * Set the directory where files will be uploaded.
     *
     * @param string $dir The directory where files will be uploaded.
     */
    public function uploadDir(string $dir): static
    {
        $this->upload_dir = $dir;
        return $this;
    }

    /**
     * Set a callback function to generate a unique filename for uploaded files.
     *
     * @param callable $callback The callback function to generate a unique filename.
     */
    public function uniqueFilenameCallback(callable $callback): static
    {
        $this->unique_filename_callback = $callback;
        return $this;
    }
}
