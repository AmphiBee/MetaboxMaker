<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\InputTooltip;

/**
 * Email field class for creating email input fields.
 */
class Email extends Input
{
    use InputTooltip;

    /**
     * The type of input field. Set to 'email'.
     */
    protected string $type = 'email';
}
