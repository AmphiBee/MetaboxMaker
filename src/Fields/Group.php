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

use InvalidArgumentException;
use AmphiBee\MetaboxMaker\Fields\Options\GroupState;
use AmphiBee\MetaboxMaker\Helpers\OptionValidator;

class Group extends Field
{
    protected string $type = 'group';

    protected array $fields = [];  // Container for all fields including nested groups

    /**
     * Adds fields to the group, which can include nested groups.
     */
    public function fields(array $fields): self
    {
        foreach ($fields as $field) {
            if (!$field instanceof Field) {
                throw new InvalidArgumentException("All fields must be instances of Field.");
            }
            $this->fields[] = $field;
        }
        return $this;
    }

    public function collapsible(bool $collapsible = true): self
    {
        $this->settings['collapsible'] = $collapsible;
        return $this;
    }

    public function saveState(bool $saveState = false): self
    {
        $this->settings['save_state'] = $saveState;
        return $this;
    }

    public function defaultState(string|GroupState $state): static
    {
        $this->settings['default_state'] = OptionValidator::check($state, GroupState::class);
        return $this;
    }

    public function groupTitle(string $title): self
    {
        $this->settings['group_title'] = $title;
        return $this;
    }

    /**
     * Builds the array structure representing the group for Metabox.io.
     */
    public function build(): array
    {
        foreach ($this->fields as $field) {
            $this->settings['fields'][] = $field->build();
        }

        return [
                'type' => $this->type,
                'name' => $this->name,
                'id' => $this->id,
            ] + $this->settings;
    }
}
