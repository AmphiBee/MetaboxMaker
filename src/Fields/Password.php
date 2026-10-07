<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\InputTooltip;

/**
 * Password field class for creating secure password input fields.
 */
class Password extends Input
{
    use InputTooltip;

    /**
     * The type of input field. Set to 'password'.
     */
    protected string $type = 'password';
}
