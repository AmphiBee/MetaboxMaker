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

namespace AmphiBee\MetaboxMaker\Transformer;

use AmphiBee\MetaboxMaker\Exception\ArgumentException;
use AmphiBee\MetaboxMaker\Exception\Enum;
use AmphiBee\MetaboxMaker\Exception\ExceptionManager;
use InvalidArgumentException;

/**
 * @package AmphiBee\MetaboxMaker\Transformer
 */
final class EnumTransformer
{
    /**
     * Convert a string to an enum value.
     *
     * @param string $value The string to be converted to an enum value.
     * @param string $enumClass The fully qualified class name of the enum.
     * @param string|bool $errorMessage An optional error message to be thrown if the string does not match any enum value.
     *
     * @return string The enum value corresponding to the input string.
     *
     * @throws InvalidArgumentException If the input string does not match any enum value and an error message is not provided.
     */
    public static function convertStringToEnumValue(string $value, string $enumClass, string|bool $errorMessage = null): string
    {
        $enumValue = $enumClass::tryFrom($value);
        if ($enumValue === null) {
            if (!$errorMessage) {
                $errorMessage = Enum::generateErrorMessageFromEnumValues($enumClass);
            }
            throw new InvalidArgumentException($errorMessage);
        }
        return $enumValue->value;
    }
}
