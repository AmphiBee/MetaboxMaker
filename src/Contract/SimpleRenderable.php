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

namespace AmphiBee\MetaboxMaker\Contract;

/**
 * SimpleRenderable interface defines the contract for any class that can be rendered with a single parameter.
 */
interface SimpleRenderable
{
    /**
     * Create a new instance of the SimpleRenderable class.
     *
     * @param  string  $name  The name of the instance.
     * @return static A new instance of the SimpleRenderable class.
     */
    public static function make(string $name): static;

    /**
     * Build the instance and return its data as an array.
     *
     * @return array The data of the instance as an array.
     */
    public function build(): array;
}
