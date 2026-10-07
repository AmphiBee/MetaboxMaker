<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Password field class for creating secure password input fields.
 */
class Password extends Input
{
    /**
     * The type of input field. Set to 'password'.
     */
    protected string $type = 'password';
}
