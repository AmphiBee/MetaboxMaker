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

/**
 * Represents a group field in a metabox.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
final class Group extends Field
{
    /**
     * The type of field.
     *
     * @var string
     */
    protected string $type = 'group';

    /**
     * Container for all fields including nested groups.
     *
     * @var array
     */
    protected array $fields = [];

    /**
     * Whether the group is collapsible.
     *
     * @var bool
     */
    protected bool $collapsible = false;

    /**
     * Whether the group state should be saved.
     *
     * @var bool
     */
    protected bool $save_state = false;

    /**
     * The default state of the group.
     *
     * @var string|GroupState
     */
    protected string|GroupState $default_state;

    /**
     * The title of the group.
     *
     * @var string
     */
    protected string $group_title = '';

    /**
     * Adds fields to the group, which can include nested groups.
     *
     * @param array $fields An array of Field instances to add to the group.
     *
     * @return self The instance of the Group class for method chaining.
     *
     * @throws InvalidArgumentException If any of the fields is not an instance of Field.
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

    /**
     * Sets whether the group is collapsible.
     *
     * @param bool $collapsible Whether the group should be collapsible. Default is true.
     *
     * @return self The instance of the Group class for method chaining.
     */
    public function collapsible(bool $collapsible = true): self
    {
        $this->collapsible = $collapsible;

        return $this;
    }

    /**
     * Sets whether the group state should be saved.
     *
     * @param bool $saveState Whether the group state should be saved. Default is true.
     *
     * @return self The instance of the Group class for method chaining.
     */
    public function saveState(bool $saveState = true): self
    {
        $this->save_state = $saveState;

        return $this;
    }

    /**
     * Sets the default state of the group.
     *
     * @param string|GroupState $state The default state of the group.
     *
     * @return static The instance of the Group class.
     */
    public function defaultState(string|GroupState $state): static
    {
        $this->default_state = OptionValidator::check($state, GroupState::class);

        return $this;
    }

    /**
     * Sets the title of the group.
     *
     * @param string $title The title of the group.
     *
     * @return self The instance of the Group class for method chaining.
     */
    public function groupTitle(string $title): self
    {
        $this->group_title = $title;

        return $this;
    }
}
