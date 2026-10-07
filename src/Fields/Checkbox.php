<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Checkbox field class for creating checkbox input fields.
 */
class Checkbox extends Field
{
    /**
     * The type of input field. Defaults to 'checkbox'.
     */
    protected string $type = 'checkbox';

    /**
     * Whether the checkbox is checked by default.
     *
     * @var bool
     */
    protected mixed $std;

    /**
     * Set whether the checkbox is checked by default.
     *
     * @param  bool  $std  Whether the checkbox is checked by default.
     * @return static Returns the instance of the Checkbox class for method chaining.
     */
    public function checkedByDefault(bool $std = true): static
    {
        $this->std = $std;

        return $this;
    }
}
