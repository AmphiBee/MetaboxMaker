<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * FileInput field class for creating a simple text input for uploading a single file
 */
class FileInput extends Field
{
    /**
     * The type of input field. Set to 'file_input'.
     */
    protected string $type = 'file_input';
}
