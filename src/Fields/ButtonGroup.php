<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\Inline;
use Pollora\Metabox\Fields\Settings\Multiple;
use Pollora\Metabox\Fields\Settings\Options;

/**
 * ButtonGroup field class for creating groups of button elements.
 */
class ButtonGroup extends Field
{
    use Inline, Multiple, Options;

    /**
     * The type of input field. Set to 'button_group'.
     */
    protected string $type = 'button_group';
}
