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
final class ColorValidation
{
    /**
     * Ensures that the provided value is a color.
     *
     * @param string $color The color value to be validated.
     *
     * @throws InvalidArgumentException If the value is not a string.
     */
    public static function ensureIsColor(string $color): void
    {
        $isColor =  preg_match('/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/', $color) ||  // HEX
            preg_match('/^rgb\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3})\)$/', $color) ||  // RGB
            preg_match('/^rgba\((\d{1,3}),\s*(\d{1,3}),\s*(\d{1,3}),\s*(0|1|0?\.\d+)\)$/', $color) ||  // RGBA
            preg_match('/^hsl\((\d{1,3}),\s*(\d{1,3})%,\s*(\d{1,3})%\)$/', $color) ||  // HSL
            preg_match('/^hsla\((\d{1,3}),\s*(\d{1,3})%,\s*(\d{1,3})%,\s*(0|1|0?\.\d+)\)$/', $color);

        if (!$isColor) {
            throw new InvalidArgumentException("Please provide a valid color.");
        }
    }
}
