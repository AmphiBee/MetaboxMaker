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

use AmphiBee\MetaboxMaker\Contract\Renderable;
use AmphiBee\MetaboxMaker\Fields\Settings\Clonable;
use AmphiBee\MetaboxMaker\Fields\Settings\DefaultValue;
use AmphiBee\MetaboxMaker\Fields\Settings\Description;
use AmphiBee\MetaboxMaker\Fields\Settings\FieldAccess;
use AmphiBee\MetaboxMaker\Fields\Settings\Multiple;
use AmphiBee\MetaboxMaker\Fields\Settings\Placeholder;
use AmphiBee\MetaboxMaker\Fields\Settings\Required;
use AmphiBee\MetaboxMaker\Fields\Settings\Sortable;
use AmphiBee\MetaboxMaker\Fields\Settings\Tab;
use AmphiBee\MetaboxMaker\Fields\Utils\Builder;
use AmphiBee\MetaboxMaker\Transformer\EmptyValueFilter;

/**
 * Abstract class for all fields.
 */
abstract class Field implements Renderable
{
    use Builder;
    /**
     * The type of the field.
     */
    protected string $type = 'text';

    /**
     * The settings for the field.
     */
    protected array $settings = [];

    /**
     * Trait for cloning the field.
     */
    use Clonable;

    /**
     * Trait for setting a default value for the field.
     */
    use DefaultValue;

    /**
     * Trait for adding a description to the field.
     */
    use Description;

    /**
     * Trait for setting the field access.
     */
    use FieldAccess;

    /**
     * Trait for setting whether the field is multiple or not.
     */
    use Multiple;

    /**
     * Trait for setting a placeholder for the field.
     */
    use Placeholder;

    /**
     * Trait for setting whether the field is required or not.
     */
    use Required;

    /**
     * Trait for setting the sort order of the field.
     */
    use Sortable;

    use Tab;

    /**
     * Constructor for the Field class.
     *
     * @param  string  $name  The name of the field.
     * @param  string  $id  The id of the field.
     */
    public function __construct(
        /**
         * The name of the field.
         */
        protected string $name,
        /**
         * The id of the field.
         */
        protected string $id
    ) {
    }

    /**
     * Factory method for creating a new instance of the Field class.
     *
     * @param mixed ...$args Required arguments (name, id)
     */
    public static function make(mixed ...$args): static
    {
        [$name, $id] = $args;
        return new static($name, $id);
    }

    public function getType(): string
    {
        return $this->type;
    }
}
