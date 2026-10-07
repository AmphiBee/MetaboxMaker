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

    /**
     * Represents a search input field.
     */
    case Search = 'search';

    /**
     * Represents a telephone input field.
     */
    case Tel = 'tel';

    /**
     * Represents a month input field.
     */
    case Month = 'month';

    /**
     * Represents a week input field.
     */
    case Week = 'week';

    /**
     * Represents a local date and time input field.
     */
    case DatetimeLocal = 'datetime-local';
}
