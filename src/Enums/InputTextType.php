<?php
/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/metabox-builder
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Enums;

/**
 * Enum representing different types of input text fields.
 */
enum InputTextType: string
{
    /**
     * Represents a standard text input field.
     *
     * @var string Text
     */
    case Text = 'text';

    /**
     * Represents a URL input field.
     *
     * @var string URL
     */
    case URL = 'url';

    /**
     * Represents an email input field.
     *
     * @var string Email
     */
    case Email = 'email';
}
