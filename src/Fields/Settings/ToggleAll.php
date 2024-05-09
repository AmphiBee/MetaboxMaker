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

namespace AmphiBee\MetaboxMaker\Fields\Settings;

/**
 * Trait for toggle all action.
 */
trait ToggleAll
{
    /**
     * Whether to display a "Toggle All" button.
     */
    protected bool $select_all_none;

    /**
     * Set whether to display a "Toggle All" button.
     *
     * @param  bool  $select_all_none  Display "Toggle All" button.
     * @return static Returns the instance of the class for method chaining.
     */
    public function toggleAllButton(bool $select_all_none = true): static
    {
        $this->select_all_none = $select_all_none;

        return $this;
    }
}
