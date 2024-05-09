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
     * The allowed MIME types for uploaded files.
     */
    protected array $mime_types;

    /**
     * Set the allowed MIME types for uploaded files.
     *
     * @param  array  $types  An array of MIME types.
     */
    public function mimeTypes(array $types): static
    {
        $this->mime_types = $types;

        return $this;
    }
}
