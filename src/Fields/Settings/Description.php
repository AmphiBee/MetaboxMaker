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
 * Trait for adding description and label description to a field.
 */
trait Description
{
    /**
     * @var string|null The description of the field.
     */
    protected string $desc;

    /**
     * @var string The label description of the field.
     */
    protected string $label_description;

    /**
     * Sets the description of the field.
     *
     * @param string $description The description to set.
     * @return static The instance of the class with the updated description.
     */
    public function description(string $description): static
    {
        $this->desc = $description;

        return $this;
    }

    /**
     * Sets the label description of the field.
     *
     * @param string $labelDescription The label description to set.
     * @return static The instance of the class with the updated label description.
     */
    public function labelDescription(string $labelDescription): static
    {
        $this->label_description = $labelDescription;

        return $this;
    }
}
