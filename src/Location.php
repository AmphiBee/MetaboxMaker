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

namespace AmphiBee\MetaboxMaker;

/**
 * This class is used to define conditions for a conditional location of a fieldset.
 */
class Location
{
    /**
     * @var array
     *
     * Stores the conditions for the location.
     */
    protected array $conditions = [];

    /**
     * Location constructor.
     *
     * Initializes a new instance of the Location class with the specified type and values.
     *
     * @param  string  $type
     *                        The type of condition to be applied.
     * @param  string|array  $values
     *                                The values associated with the condition.
     */
    public function __construct(protected string $type, string|array $values)
    {
        $this->conditions[$type] = $values;
    }

    /**
     * Location::where
     *
     * Creates a new instance of the Location class with the specified type and values.
     *
     * @param  string  $type
     *                        The type of condition to be applied.
     * @param  string|array  $values
     *                                The values associated with the condition.
     * @return static
     *                Returns a new instance of the Location class with the specified type and values.
     */
    public static function where(string $type, string|array $values): static
    {
        return new static($type, $values);
    }

    /**
     * Location::default
     *
     * Creates a new instance of the Location class with the default type and values.
     *
     * @return static
     *                Returns a new instance of the Location class with the default type and values.
     */
    public static function default(): static
    {
        return new static('post_type', ['post']);
    }

    /**
     * Location::get
     *
     * Retrieves the conditions associated with the location.
     *
     * @return array
     *               Returns an array containing the conditions associated with the location.
     */
    public function get(): array
    {
        return $this->conditions;
    }
}
