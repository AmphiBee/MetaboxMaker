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

use AmphiBee\MetaboxMaker\Enums\GroupState;
use AmphiBee\MetaboxMaker\Helpers\OptionValidator;
use InvalidArgumentException;

class Group extends Field
{
    protected string $type = 'group';

    protected array $fields = []; // Container for all fields including nested groups

    protected bool $collapsible = false;

    protected bool $save_state = false;

    protected string|GroupState $default_state;

    protected string $group_title = '';

    /**
     * Adds fields to the group, which can include nested groups.
     */
    public function fields(array $fields): self
    {
        foreach ($fields as $field) {
            if (! $field instanceof Field) {
                throw new InvalidArgumentException('All fields must be instances of Field.');
            }
            $this->fields[] = $field->build();
        }

        return $this;
    }

    public function collapsible(bool $collapsible = true): self
    {
        $this->collapsible = $collapsible;

        return $this;
    }

    public function saveState(bool $saveState = true): self
    {
        $this->save_state = $saveState;

        return $this;
    }

    public function defaultState(string|GroupState $state): static
    {
        $this->default_state = OptionValidator::check($state, GroupState::class);

        return $this;
    }

    public function groupTitle(string $title): self
    {
        $this->group_title = $title;

        return $this;
    }
}
