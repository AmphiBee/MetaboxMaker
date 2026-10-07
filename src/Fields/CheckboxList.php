<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ToggleAll;

/**
 * CheckboxList field class for creating a list of checkboxes.
 */
class CheckboxList extends Radio
{
    use ToggleAll;

    /**
     * The type of input field. Defaults to 'checkbox_list'.
     */
    protected string $type = 'checkbox_list';
}
