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

use AmphiBee\MetaboxMaker\Fields\Settings\Size;

/**
 * OEmbed field class for embedding media content from various oEmbed-supported services.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
final class OEmbed extends Field
{
    use Size;
    /**
     * The type of input field. Set to 'oembed'.
     */
    protected string $type = 'oembed';

    /**
     * Text to display when the embedded media is not available.
     */
    protected string $not_available_string = 'Content not available';


    /**
     * Set the text message for unavailable embedded media.
     *
     * @param string $message Message to display.
     */
    public function notAvailableText(string $message): static
    {
        $this->not_available_string = $message;
        return $this;
    }
}
