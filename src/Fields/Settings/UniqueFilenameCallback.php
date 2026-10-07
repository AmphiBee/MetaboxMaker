<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling the unique filename callback for uploaded files.
 */
trait UniqueFilenameCallback
{
    /**
     * A callback function to generate a unique filename for uploaded files.
     *
     * @var callable
     */
    protected $unique_filename_callback;

    /**
     * Set a callback function to generate a unique filename for uploaded files.
     *
     * @param  callable  $callback  The callback function to generate a unique filename.
     */
    public function uniqueFilenameCallback(callable $callback): static
    {
        $this->unique_filename_callback = $callback;

        return $this;
    }
}
