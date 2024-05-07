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

namespace AmphiBee\MetaboxMaker\Validation;

use InvalidArgumentException;

/**
 * Ensures that the provided value is a string.
 *
 * @param mixed $value The value to be validated.
 * @param string $enumClass The fully-qualified class name of the enum class.
 *
 * @throws InvalidArgumentException If the value is not a string.
 */
final class StringValidation
{
    /**
     * Ensures that the provided value is a string.
     *
     * @param mixed $value The value to be validated.
     * @param string $enumClass The fully-qualified class name of the enum class.
     *
     * @throws InvalidArgumentException If the value is not a string.
     */
    public static function ensureIsString(mixed $value, string $enumClass): void
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException("Type must be either a string or an instance of {$enumClass}.");
        }
    }
}
