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

use AmphiBee\MetaboxMaker\Fields\Settings\MapParams;

/**
 * GoogleMap field class for integrating Google Maps into forms or meta boxes.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class GoogleMap extends Field
{
    use MapParams;
    /**
     * The type of input field. Set to 'google_map'.
     */
    protected string $type = 'google_map';

    /**
     * Google Maps API key.
     */
    protected string $api_key;

    /**
     * Set the Google Maps API key.
     *
     * @param string $api_key Google Maps API key.
     */
    public function apiKey(string $api_key): static
    {
        $this->api_key = $api_key;
        return $this;
    }
}
