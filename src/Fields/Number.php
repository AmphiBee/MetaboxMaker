<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\RangeParams;

/**
 * Number field class for creating number input fields.
 */
class Number extends Input
{
    use RangeParams;

    protected string $type = 'number';
}
