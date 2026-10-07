<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/MetaboxMaker
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker;

/**
 * This class is used to define conditions for a conditional location of a fieldset.
 *
 * @phpstan-consistent-constructor
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
        return new static('post_types', ['post']);
    }

    /**
     * Show the meta box on the edit screen of the given post types.
     */
    public static function postTypes(string|array $postTypes): static
    {
        return new static('post_types', (array) $postTypes);
    }

    /**
     * Show the meta box on the edit screen of terms of the given taxonomies (MB Term Meta).
     */
    public static function taxonomies(string|array $taxonomies): static
    {
        return new static('taxonomies', (array) $taxonomies);
    }

    /**
     * Show the meta box on the given settings pages (MB Settings Page).
     */
    public static function settingsPages(string|array $settingsPages): static
    {
        return new static('settings_pages', (array) $settingsPages);
    }

    /**
     * Show the meta box on the user profile screen (MB User Meta).
     */
    public static function user(): static
    {
        return new static('type', 'user');
    }

    /**
     * Show the meta box on the comment edit screen (MB Comment Meta).
     */
    public static function comment(): static
    {
        return new static('type', 'comment');
    }

    /**
     * Add another condition to the location, e.g. a settings page tab.
     */
    public function andWhere(string $type, string|array $values): static
    {
        $this->conditions[$type] = $values;

        return $this;
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
