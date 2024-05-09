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

final class NumericValidation
{
    public static function ensureIsNumeric(string|float|int $value): void
    {
        if (! in_array($value, [null, 'any'], true) && ! is_numeric($value)) {
            throw new InvalidArgumentException("Step must be a numeric value, 'any', or null.");
        }
    }
}
