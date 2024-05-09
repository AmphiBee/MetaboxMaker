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

use AmphiBee\MetaboxMaker\Fields\Settings\Options;
use AmphiBee\MetaboxMaker\Fields\Settings\ToggleAll;

/**
 * Select field class for creating dropdown select fields.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class Select extends Field
{
    /**
     * The type of input field. Defaults to 'select'.
     */
    protected string $type = 'select';

    /**
     * Whether to display sub items without indentation.
     */
    protected bool $flatten;

    use Options, ToggleAll;

    /**
     * Set whether to display sub items without indentation.
     *
     * @param bool $flatten Display sub items without indentation.
     * @return static Returns the instance of the Select class for method chaining.
     */
    public function flatten(bool $flatten = true): static
    {
        $this->flatten = $flatten;

        return $this;
    }
}
