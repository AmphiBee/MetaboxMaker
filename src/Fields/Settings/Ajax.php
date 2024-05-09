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
 * Trait to handle ajax for form fields.
 */
trait Ajax
{
    /**
     * @var bool Whether the field should use AJAX. Defaults to true.
     */
    protected bool $ajax;

    use JsOptions;

    /**
     * Set whether the field should use AJAX.
     *
     * @param  bool  $ajax  Whether the field should use AJAX. Defaults to true.
     * @return self The instance of the class for method chaining.
     */
    public function ajax(bool $ajax = true): self
    {
        $this->ajax = $ajax;

        return $this;
    }

    /**
     * Set the minimum input length for AJAX.
     *
     * @param  int  $minimumInputLength  The minimum input length for AJAX.
     * @return self The instance of the class for method chaining.
     */
    public function minimumInputLength(int $minimumInputLength): self
    {
        $this->js_options['minimumInputLength'] = $minimumInputLength;

        return $this;
    }
}
