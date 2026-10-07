<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

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
