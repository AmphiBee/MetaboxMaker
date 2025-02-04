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

namespace AmphiBee\MetaboxMaker\Fields\Utils;

use AmphiBee\MetaboxMaker\Transformer\EmptyValueFilter;

/**
 * Trait to build fields.
 */
trait Builder
{
    /**
     * Builds the field and returns its properties as an associative array.
     *
     * @return array The properties of the field.
     */
    public function build(): array
    {
        return EmptyValueFilter::filter(get_object_vars($this));
    }
}
