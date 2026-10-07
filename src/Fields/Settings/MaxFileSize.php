<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling max file size settings in metabox fields.
 */
trait MaxFileSize
{
    /**
     * The maximum size of file uploads allowed.
     */
    protected int|string $max_file_size;

    /**
     * Set the maximum size of file uploads allowed.
     *
     * @param  int|string  $max  The maximum size, in bytes or with a unit: "500kb", "10mb", "1gb".
     */
    public function maxFileSize(int|string $max): static
    {
        $this->max_file_size = $max;

        return $this;
    }
}
