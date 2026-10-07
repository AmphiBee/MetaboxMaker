<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\EditorParams;

/**
 * WYSIWYG (Rich Text Editor) field class to handle rich text inputs.
 */
class Wysiwyg extends Field
{
    use EditorParams;

    /**
     * The type of input field. Set to 'date'.
     */
    protected string $type = 'wysiwyg';

    /**
     * Whether to save content in the raw format without wpautop().
     */
    protected bool $raw;

    /**
     * Set whether to save data in raw format.
     */
    public function raw(bool $raw = true): static
    {
        $this->raw = $raw;

        return $this;
    }
}
