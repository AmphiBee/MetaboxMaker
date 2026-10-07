<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

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
