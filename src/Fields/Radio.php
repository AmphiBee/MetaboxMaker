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

use AmphiBee\MetaboxMaker\Fields\Settings\Inline;
use AmphiBee\MetaboxMaker\Fields\Settings\Options;

/**
 * Radio field class for creating radio button input fields.
 */
class Radio extends Field
{
    /**
     * The type of the field.
     */
    protected string $type = 'radio';

    use Inline, Options;
}
