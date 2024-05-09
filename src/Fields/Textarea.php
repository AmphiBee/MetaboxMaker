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

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * Text field class for creating text input fields.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Textarea extends Field
{
    /**
     * The type of the field.
     */
    protected string $type = 'textarea';

    /**
     * The number of columns for the textarea.
     */
    protected int $cols = 60;

    /**
     * The number of rows for the textarea.
     */
    protected int $rows = 4;

    /**
     * Set the number of columns for the textarea.
     *
     * @param int $cols The number of columns.
     * @return static Returns the instance of the Textarea class for method chaining.
     */
    public function cols(int $cols): static
    {
        $this->cols = $cols;

        return $this;
    }

    /**
     * Set the number of rows for the textarea.
     *
     * @param int $rows The number of rows.
     * @return static Returns the instance of the Textarea class for method chaining.
     */
    public function rows(int $rows): static
    {
        $this->rows = $rows;

        return $this;
    }
}
