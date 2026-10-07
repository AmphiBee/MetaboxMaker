<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\GeoBinding;

/**
 * Hidden field class for creating a hidden field.
 */
class Hidden extends Field
{
    use GeoBinding;

    /**
     * The type of input field. Set to 'hidden'.
     */
    protected string $type = 'hidden';
}
