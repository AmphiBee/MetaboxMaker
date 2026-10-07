<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Contract\Renderable;
use Pollora\Metabox\Fields\Settings\ConditionalLogic;
use Pollora\Metabox\Fields\Settings\Tab;
use Pollora\Metabox\Fields\Utils\Builder;

/**
 * Divider field class for creating visual separators in the UI.
 *
 * @phpstan-consistent-constructor
 */
class Divider implements Renderable
{
    use Builder, Tab;
    use ConditionalLogic;

    /**
     * The type of field, set to 'divider'.
     */
    protected string $type = 'divider';

    /**
     * Create a divider.
     */
    public static function make(): static
    {
        return new static;
    }
}
