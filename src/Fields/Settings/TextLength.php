<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for the minimum and maximum number of characters, checked by the browser.
 */
trait TextLength
{
    /**
     * The minimum number of characters.
     */
    protected int $minlength;

    /**
     * The maximum number of characters.
     */
    protected int $maxlength;

    /**
     * Set the minimum number of characters, checked by the browser.
     */
    public function minLength(int $length): static
    {
        $this->minlength = $length;

        return $this;
    }

    /**
     * Set the maximum number of characters, checked by the browser.
     *
     * To show a live counter, use maxCharacters() instead (MB Text Limiter).
     */
    public function maxLength(int $length): static
    {
        $this->maxlength = $length;

        return $this;
    }
}
