<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Contract\Renderable;
use Pollora\Metabox\Fields\Settings\Description;
use Pollora\Metabox\Fields\Settings\Tab;
use Pollora\Metabox\Fields\Utils\Builder;

/**
 * Heading field class for creating section headings in the UI.
 * Cette classe est un type spécial de champ qui ne nécessite qu'un titre.
 *
 * @phpstan-consistent-constructor
 */
class Heading implements Renderable
{
    use Builder, Description, Tab;

    /**
     * The type of field.
     */
    protected string $type = 'heading';

    /**
     * Constructor for the Heading class.
     *
     * @param  string  $name  The title of the heading.
     */
    public function __construct(protected string $name) {}

    /**
     * Static make method to create a new instance of the Heading.
     *
     * @param  mixed  ...$args  Required arguments (name)
     */
    public static function make(mixed ...$args): static
    {
        return new static($args[0] ?? '');
    }

    /**
     * Method to set or update the description of the heading.
     *
     * @param  string  $desc  Description for the heading.
     */
    public function description(string $desc): static
    {
        $this->desc = $desc;

        return $this;
    }
}
