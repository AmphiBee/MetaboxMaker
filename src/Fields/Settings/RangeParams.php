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

namespace AmphiBee\MetaboxMaker\Fields\Settings;

use AmphiBee\MetaboxMaker\Validation\NumericValidation;

/**
 * Trait to handle range attributes for form fields.
 */
trait RangeParams
{
    /**
     * @var float|int The minimum value allowed for the range input.
     */
    protected float|int $min;

    /**
     * @var float|int The maximum value allowed for the range input.
     */
    protected float|int $max;

    /**
     * @var int|float|string The increment or decrement value for the range input.
     */
    protected int|float|string $step;

    /**
     * Set the minimum value allowed for the range input.
     *
     * @param  int|float  $min  The minimum value.
     * @return static The instance of the class for method chaining.
     */
    public function min(int|float $min): static
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Set the maximum value allowed for the range input.
     *
     * @param  int|float  $max  The maximum value.
     * @return static The instance of the class for method chaining.
     */
    public function max(int|float $max): static
    {
        $this->max = $max;

        return $this;
    }

    /**
     * Set the increment or decrement value for the range input.
     *
     * @param  int|float|string  $step  The increment or decrement value.
     * @return static The instance of the class for method chaining.
     */
    public function step(int|float|string $step): static
    {
        NumericValidation::ensureIsNumeric($step);

        $this->step = $step;

        return $this;
    }
}
