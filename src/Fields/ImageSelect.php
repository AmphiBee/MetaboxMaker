<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Multiple;
use Pollora\Metabox\Fields\Settings\Options;

/**
 * ImageSelect field class for creating image selection fields.
 */
class ImageSelect extends Field
{
    use Multiple, Options;

    /**
     * The type of the field.
     */
    protected string $type = 'image_select';
}
