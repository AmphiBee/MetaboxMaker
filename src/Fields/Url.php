<?php

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * Url field class for creating URL input fields.
 */
class Url extends Text
{
    /**
     * The type of input field. Set to 'url'.
     */
    protected string $type = 'url';
} 