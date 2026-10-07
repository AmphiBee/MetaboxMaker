<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\TreeOptions;

/**
 * Select tree field: one select per level of hierarchical options, the
 * children of the selected option shown below it. Saves several values.
 */
class SelectTree extends Field
{
    use TreeOptions;

    protected string $type = 'select_tree';
}
