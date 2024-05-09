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

namespace AmphiBee\MetaboxMaker\Fields;

/**
 * CustomHtml field class for rendering custom HTML content.
 */
class CustomHtml extends Field
{
    /**
     * The type of input field. Set to 'custom_html'.
     */
    protected string $type = 'custom_html';

    /**
     * Optional PHP callback function that returns custom HTML content.
     *
     * @var callable|null
     */
    protected $callback;

    /**
     * Set the HTML content.
     *
     * @param  string  $html  HTML content.
     */
    public function content(string $html): static
    {
        $this->std = $html;

        return $this;
    }

    /**
     * Set a PHP callback function that returns the HTML content.
     *
     * @param  callable  $callback  PHP callback.
     */
    public function callback(callable $callback): static
    {
        $this->callback = $callback;

        return $this;
    }
}
