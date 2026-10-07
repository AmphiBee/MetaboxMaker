<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\Options;

/**
 * Radio field class for creating radio button input fields.
 */
class Radio extends Field
{
    use Inline, Options;

    /**
     * The type of the field.
     */
    protected string $type = 'radio';
}
