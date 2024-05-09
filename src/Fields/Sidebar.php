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

use AmphiBee\MetaboxMaker\Enums\SidebarFieldType;
use AmphiBee\MetaboxMaker\Validation\OptionValidation;

/**
 * Sidebar field class for creating different types of sidebar input fields.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Sidebar extends Field
{
    /**
     * The type of the field.
     */
    protected string $type = 'sidebar';

    /**
     * The type of the field.
     */
    protected string $field_type = 'select';

    /**
     * Set the type of the field.
     *
     * @param SidebarFieldType|string $fieldType The type of the field.
     */
    public function fieldType(SidebarFieldType|string $fieldType): static
    {
        $this->field_type = OptionValidation::check($fieldType, SidebarFieldType::class);
        return $this;
    }
}
