<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Backup field: exports the values of the settings page as JSON, and imports them
 * when JSON is pasted and the page saved (MB Settings Page).
 */
class Backup extends Field
{
    protected string $type = 'backup';

    /**
     * The number of rows of the textarea.
     */
    protected int $rows;

    /**
     * Create a backup field. It only works in a meta box displayed on a settings page.
     *
     * @param  string  $name  The label of the field.
     * @param  string  $id  The ID of the field, not saved.
     */
    public static function make(string $name = 'Backup', string $id = 'backup'): static
    {
        return new static($name, $id);
    }

    /**
     * Set the number of rows of the textarea. Defaults to 5.
     */
    public function rows(int $rows): static
    {
        $this->rows = $rows;

        return $this;
    }
}
