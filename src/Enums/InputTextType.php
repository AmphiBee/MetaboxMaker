<?php

declare(strict_types=1);

namespace Pollora\Metabox\Enums;

/**
 * Enum representing different types of input text fields.
 */
enum InputTextType: string
{
    /**
     * Represents a standard text input field.
     */
    case Text = 'text';

    /**
     * Represents a URL input field.
     */
    case URL = 'url';

    /**
     * Represents an email input field.
     */
    case Email = 'email';
}
