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

use AmphiBee\MetaboxMaker\Contract\SimpleRenderable;
use AmphiBee\MetaboxMaker\Fields\Settings\Tab;
use AmphiBee\MetaboxMaker\Fields\Utils\Builder;

/**
 * Divider field class for creating visual separators in the UI.
 */
class Divider implements SimpleRenderable
{
    use Tab, Builder;

    /**
     * The type of field, set to 'divider'.
     */
    protected string $type = 'divider';

    /**
     * Factory method for creating a new instance of the Field class.
     */
    public static function make(string $name = ''): static
    {
        return new static();
    }
}
