<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

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
