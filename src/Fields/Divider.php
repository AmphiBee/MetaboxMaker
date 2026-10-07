<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Contract\Renderable;
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

    /**
     * The type of field, set to 'divider'.
     */
    protected string $type = 'divider';

    /**
     * Factory method for creating a new instance of the Divider class.
     *
     * @param  mixed  ...$args  Not used for Divider
     */
    public static function make(mixed ...$args): static
    {
        return new static;
    }
}
