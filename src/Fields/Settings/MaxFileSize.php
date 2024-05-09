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
 * Trait for handling max file size settings in metabox fields.
 */
trait MaxFileSize
{
    /**
     * The maximum size of file uploads allowed.
     */
    protected string $max_file_size;

    /**
     * Set the maximum size of file uploads allowed.
     *
     * @param  string  $max  The maximum size of file uploads.
     */
    public function maxFileSize(string $max): static
    {
        $this->max_file_size = $max;

        return $this;
    }
}
