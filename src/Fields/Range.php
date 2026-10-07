<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\RangeParams;

/**
 * Range field class for creating rang input fields.
 */
class Range extends Text
{
    use RangeParams;

    protected string $type = 'range';
}
