<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for handling MIME types for uploaded files.
 */
trait MimeType
{
    /**
     * The allowed MIME type for uploaded files.
     */
    protected string $mime_type;

    /**
     * Set the allowed MIME type for uploaded files.
     *
     * @param  string  $type  A MIME type string.
     */
    public function mimeType(string $type): static
    {
        $this->mime_type = $type;

        return $this;
    }
}
