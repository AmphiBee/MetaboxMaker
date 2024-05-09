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

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * Taxonomy Advanced field class for creating fields that allow selecting terms.
 */
class TaxonomyAdvanced extends Taxonomy
{
    /**
     * The type of field.
     */
    protected string $type = 'taxonomy_advanced';
}
