<?php

declare(strict_types=1);

namespace Pollora\Metabox\Validation;

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
