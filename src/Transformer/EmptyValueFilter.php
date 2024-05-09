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

final class EmptyValueFilter
{
    /**
     * Convert a string to an enum value.
     *
     * @param array $values The values to be filtered to an enum value.
     * @return array The filtered array.
     */
    public static function filter(array $values): array
    {
        return array_filter($values, fn ($value) => (! is_array($value) && $value !== null) || (is_array($value) && ! empty($value)));
    }
}
