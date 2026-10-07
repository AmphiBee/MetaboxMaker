<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ToggleAll;
use Pollora\Metabox\Fields\Settings\TreeOptions;

/**
 * CheckboxList field class for creating a list of checkboxes.
 */
class CheckboxList extends Radio
{
    use ToggleAll;
    use TreeOptions;

    /**
     * The type of input field. Defaults to 'checkbox_list'.
     */
    protected string $type = 'checkbox_list';

    /**
     * Whether the children of an option are hidden until it is checked.
     */
    protected bool $collapse;

    /**
     * Set whether the children of an option are hidden until it is checked, for tree
     * options. Defaults to true.
     */
    public function collapse(bool $collapse = true): static
    {
        $this->collapse = $collapse;

        return $this;
    }
}
