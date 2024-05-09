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
 * OpenStreetMap field class for integrating Open Street Map into forms or meta boxes.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class OpenStreetMap extends Field
{

    use MapParams;
    /**
     * The type of input field. Set to 'osm'.
     */
    protected string $type = 'osm';
}
