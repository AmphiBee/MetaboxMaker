<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

use InvalidArgumentException;

/**
 * Trait for laying fields out in a 12-column grid (Meta Box Columns).
 */
trait Columns
{
    /**
     * The number of grid columns the field spans, from 1 to 12.
     */
    protected int $columns;

    /**
     * Set the number of grid columns the field spans, from 1 to 12: 6 is half the width.
     */
    public function columns(int $columns): static
    {
        if ($columns < 1 || $columns > 12) {
            throw new InvalidArgumentException("A field spans 1 to 12 columns, {$columns} given.");
        }

        $this->columns = $columns;

        return $this;
    }
}
