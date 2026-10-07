<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\GeoBinding;
use Pollora\Metabox\Fields\Settings\InputTooltip;
use Pollora\Metabox\Fields\Settings\Options;
use Pollora\Metabox\Fields\Settings\ToggleAll;

/**
 * Select field class for creating dropdown select fields.
 */
class Select extends Field
{
    use GeoBinding;
    use InputTooltip;
    use Options, ToggleAll;

    /**
     * The type of input field. Defaults to 'select'.
     */
    protected string $type = 'select';

    /**
     * Whether to display sub items without indentation.
     */
    protected bool $flatten;

    /**
     * Set whether to display sub items without indentation.
     *
     * @param  bool  $flatten  Display sub items without indentation.
     * @return static Returns the instance of the Select class for method chaining.
     */
    public function flatten(bool $flatten = true): static
    {
        $this->flatten = $flatten;

        return $this;
    }
}
