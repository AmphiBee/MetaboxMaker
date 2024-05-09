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
 * Trait for setting maximum number of file uploads.
 */
trait MaxFileUpload
{
    /**
     * The maximum number of file uploads allowed.
     */
    protected int $max_file_uploads;

    /**
     * Set the maximum number of file uploads allowed.
     *
     * @param  int  $max  The maximum number of file uploads.
     */
    public function maxFileUploads(int $max): static
    {
        $this->max_file_uploads = $max;

        return $this;
    }
}
