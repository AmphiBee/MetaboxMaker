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
 * Trait for handling upload dir for uploaded files.
 */
trait UploadDir
{
    /**
     * The directory where files will be uploaded.
     */
    protected string $upload_dir;

    /**
     * Set the directory where files will be uploaded.
     *
     * @param  string  $dir  The directory where files will be uploaded.
     */
    public function uploadDir(string $dir): static
    {
        $this->upload_dir = $dir;

        return $this;
    }
}
