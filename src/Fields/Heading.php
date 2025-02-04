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

use AmphiBee\MetaboxMaker\Fields\Settings\Description;
use AmphiBee\MetaboxMaker\Fields\Settings\Tab;
use AmphiBee\MetaboxMaker\Contract\SimpleRenderable;
use AmphiBee\MetaboxMaker\Fields\Utils\Builder;
use AmphiBee\MetaboxMaker\Transformer\EmptyValueFilter;

/**
 * Heading field class for creating section headings in the UI.
 * Cette classe est un type spécial de champ qui ne nécessite qu'un titre.
 */
class Heading implements SimpleRenderable
{
    use Tab, Description, Builder;

    /**
     * The type of field.
     */
    protected string $type = 'heading';

    /**
     * Constructor for the Heading class.
     *
     * @param  string  $name  The title of the heading.
     */
    public function __construct(protected string $name)
    {
    }

    /**
     * Static make method to create a new instance of the Heading.
     *
     * @param  string  $name  The title of the heading.
     */
    public static function make(string $name): static
    {
        return new static($name);
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
