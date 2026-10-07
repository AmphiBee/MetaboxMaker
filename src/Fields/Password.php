<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Size;

/**
 * Password field class for creating secure password input fields.
 */
class Password extends Field
{
    use Size;

    /**
     * The type of input field. Set to 'password'.
     */
    protected string $type = 'password';
}
