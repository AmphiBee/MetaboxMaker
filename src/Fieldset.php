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

class Fieldset {
    protected string $context = 'normal';
    protected array $fields = [];
    protected Location $location;

    public function __construct(protected string $title, protected string $id)
    {
    }

    public static function make(string $title, string $id): static
    {
        return new static($title, $id);
    }

    public function context(string $context): static
    {
        $this->context = $context;
        return $this;
    }

    public function fields(array $fields): static
    {
        $this->fields = $fields;
        return $this;
    }

    public function location(Location $location): static
    {
        $this->location = $location;
        return $this;
    }

    public function build(): array
    {
        $fieldsBuilt = array_map(fn($field) => $field->build(), $this->fields);

        return [
            'title' => $this->title,
            'id' => $this->id,
            'context' => $this->context,
            'fields' => $fieldsBuilt,
        ] + $this->location->get();
    }
}
