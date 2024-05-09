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

use AmphiBee\MetaboxMaker\Fields\Settings\Tab;

/**
 * Divider field class for creating visual separators in the UI.
 */
class Divider
{
    use Tab;

    /**
     * The type of field, set to 'divider'.
     */
    protected string $type = 'divider';

    /**
     * Factory method for creating a new instance of the Field class.
     */
    public static function make(): static
    {
        return new static();
    }

    /**
     * Builds the field and returns its properties as an associative array.
     *
     * @return array The properties of the field.
     */
    public function build(): array
    {
        return ['type' => $this->type];
    }
}
