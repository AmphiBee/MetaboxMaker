<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\MapParams;

/**
 * OpenStreetMap field class for integrating Open Street Map into forms or meta boxes.
 */
class OpenStreetMap extends Field
{
    use MapParams;

    /**
     * The type of input field. Set to 'osm'.
     */
    protected string $type = 'osm';
}
