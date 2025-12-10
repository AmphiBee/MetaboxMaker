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
