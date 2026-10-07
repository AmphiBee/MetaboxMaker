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
 * Trait for hiding the field value from the REST API and front-end forms.
 */
trait Visibility
{
    /**
     * Whether the field is hidden from the REST API.
     */
    protected bool $hide_from_rest;

    /**
     * Whether the field is hidden from front-end forms (MB Frontend Submission).
     */
    protected bool $hide_from_front;

    /**
     * Hide the field from the REST API.
     */
    public function hideFromRest(bool $hide = true): static
    {
        $this->hide_from_rest = $hide;

        return $this;
    }

    /**
     * Hide the field from front-end forms.
     */
    public function hideFromFront(bool $hide = true): static
    {
        $this->hide_from_front = $hide;

        return $this;
    }
}
