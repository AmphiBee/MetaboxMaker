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
 * @package AmphiBee\MetaboxMaker\Validation
 */
final class EnumValidation
{
    /**
     * Checks if the provided enum class exists.
     *
     * @param string $enumClass The name of the enum class to be validated.
     *
     * @throws InvalidArgumentException If the enum class does not exist.
     */
    public static function validateEnumClass(string $enumClass): void
    {
        if (!class_exists($enumClass)) {
            throw new InvalidArgumentException("Invalid enum class: {$enumClass}");
        }
    }
}
