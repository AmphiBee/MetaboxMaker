<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

/**
 * Link field class for selecting a URL, a link text and a target, like the WordPress link picker.
 *
 * The value is saved as an array with the url, title, target and post_id keys.
 */
class Link extends Field
{
    /**
     * The type of field.
     */
    protected string $type = 'link';
}
