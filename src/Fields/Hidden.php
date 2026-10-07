<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Hidden field class for creating a hidden field.
 */
class Hidden extends Field
{
    /**
     * The type of input field. Set to 'hidden'.
     */
    protected string $type = 'hidden';
}
