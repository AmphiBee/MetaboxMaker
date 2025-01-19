<?php

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * Email field class for creating email input fields.
 */
class Email extends Text
{
    /**
     * The type of input field. Set to 'email'.
     */
    protected string $type = 'email';
} 