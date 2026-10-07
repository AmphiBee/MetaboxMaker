<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\InputTooltip;

/**
 * Url field class for creating URL input fields.
 */
class Url extends Input
{
    use InputTooltip;

    /**
     * The type of input field. Set to 'url'.
     */
    protected string $type = 'url';
}
