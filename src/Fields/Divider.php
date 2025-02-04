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

use AmphiBee\MetaboxMaker\Contract\Renderable;
use AmphiBee\MetaboxMaker\Fields\Settings\Tab;
use AmphiBee\MetaboxMaker\Fields\Utils\Builder;

/**
 * Divider field class for creating visual separators in the UI.
 */
class Divider implements Renderable
{
    use Tab, Builder;

    /**
     * The type of field, set to 'divider'.
     */
    protected string $type = 'divider';

    /**
     * Factory method for creating a new instance of the Divider class.
     * 
     * @param mixed ...$args Not used for Divider
     */
    public static function make(mixed ...$args): static
    {
        return new static();
    }
}
