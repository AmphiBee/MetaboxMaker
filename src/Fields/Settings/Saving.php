<?php

/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/MetaboxMaker
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Fields\Settings;

/**
 * Trait for how the field value is saved.
 */
trait Saving
{
    /**
     * Whether Meta Box saves the field value.
     */
    protected bool $save_field;

    /**
     * Custom sanitize callback, or 'none' to skip sanitization.
     *
     * @var callable|string
     */
    protected $sanitize_callback;

    /**
     * Set whether Meta Box saves the field value. Useful for fields handled by custom code.
     */
    public function saveField(bool $saveField = true): static
    {
        $this->save_field = $saveField;

        return $this;
    }

    /**
     * Set a custom sanitize callback, or 'none' to skip sanitization.
     */
    public function sanitizeCallback(callable|string $callback): static
    {
        $this->sanitize_callback = $callback;

        return $this;
    }
}
