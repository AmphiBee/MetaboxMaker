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

class Location
{
    protected array $conditions = [];

    public function __construct(protected string $type, mixed $values)
    {
        $this->conditions[$type] = $values;
    }

    public static function where(string $type, mixed $values): static
    {
        return new static($type, $values);
    }

    public static function default(): static
    {
        return new static('post_type', ['post']);
    }

    public function get()
    {
        return $this->conditions;
    }
}
