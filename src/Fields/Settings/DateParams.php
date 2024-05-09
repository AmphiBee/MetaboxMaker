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

/**
 * Trait for date field parameters.
 */
trait DateParams
{
    /**
     * Whether to save the date as a Unix timestamp.
     */
    protected bool $timestamp;

    /**
     * Custom PHP format for saving the date.
     */
    protected string $save_format;


    /**
     * Set whether to save the date as a Unix timestamp.
     *
     * @param bool $timestamp Save as timestamp.
     * @return static Returns the instance of the DatePicker class for method chaining.
     */
    public function saveAsTimestamp(bool $timestamp = true): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Set the PHP save format for the date.
     *
     * @param string $save_format PHP date format.
     * @return static Returns the instance of the DatePicker class for method chaining.
     */
    public function saveFormat(string $save_format): static
    {
        $this->save_format = $save_format;

        return $this;
    }
}
