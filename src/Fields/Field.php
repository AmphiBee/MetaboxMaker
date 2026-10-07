<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Contract\Renderable;
use Pollora\Metabox\Fields\Settings\Attributes;
use Pollora\Metabox\Fields\Settings\Clonable;
use Pollora\Metabox\Fields\Settings\DefaultValue;
use Pollora\Metabox\Fields\Settings\Description;
use Pollora\Metabox\Fields\Settings\FieldAccess;
use Pollora\Metabox\Fields\Settings\Multiple;
use Pollora\Metabox\Fields\Settings\Placeholder;
use Pollora\Metabox\Fields\Settings\Required;
use Pollora\Metabox\Fields\Settings\Saving;
use Pollora\Metabox\Fields\Settings\Sortable;
use Pollora\Metabox\Fields\Settings\Tab;
use Pollora\Metabox\Fields\Settings\Visibility;
use Pollora\Metabox\Fields\Settings\Wrapper;
use Pollora\Metabox\Fields\Utils\Builder;

/**
 * Abstract class for all fields.
 *
 * @phpstan-consistent-constructor
 */
abstract class Field implements Renderable
{
    /**
     * Trait for custom HTML attributes.
     */
    use Attributes;

    use Builder;

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
     * Trait for how the field value is saved.
     */
    use Saving;

    /**
     * Trait for setting the sort order of the field.
     */
    use Sortable;

    use Tab;

    /**
     * Trait for hiding the field from the REST API and front-end forms.
     */
    use Visibility;

    /**
     * Trait for the wrapper class and the HTML before / after the field.
     */
    use Wrapper;

    /**
     * The type of the field.
     */
    protected string $type = 'text';

    /**
     * The settings for the field.
     */
    protected array $settings = [];

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
    ) {}

    /**
     * Factory method for creating a new instance of the Field class.
     *
     * @param  mixed  ...$args  Required arguments (name, id)
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

    public function setting(string $key, mixed $value): static
    {
        $this->settings[$key] = $value;

        return $this;
    }

    /**
     * Get the custom settings for the field.
     *
     * @return array The custom settings.
     */
    public function getSettings(): array
    {
        return $this->settings;
    }
}
