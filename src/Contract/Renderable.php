<?php

declare(strict_types=1);

namespace Pollora\Metabox\Contract;

/**
 * Renderable interface defines the contract for any class that can be rendered.
 */
interface Renderable
{
    /**
     * Create a new instance of the Renderable class.
     *
     * @param  mixed  ...$args  Required arguments for instance creation
     * @return static A new instance of the Renderable class.
     */
    public static function make(mixed ...$args): static;

    /**
     * Build the instance and return its data as an array.
     *
     * @return array The data of the instance as an array.
     */
    public function build(): array;
}
