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

use AmphiBee\MetaboxMaker\Fields\Settings\Clonable;
use AmphiBee\MetaboxMaker\Fields\Settings\DefaultValue;
use AmphiBee\MetaboxMaker\Fields\Settings\Description;
use AmphiBee\MetaboxMaker\Fields\Settings\Multiple;
use AmphiBee\MetaboxMaker\Fields\Settings\Placeholder;
use AmphiBee\MetaboxMaker\Fields\Settings\FieldAccess;
use AmphiBee\MetaboxMaker\Fields\Settings\Required;
use AmphiBee\MetaboxMaker\Fields\Settings\Sortable;

abstract class Field
{
    protected string $type = 'text';
    protected array $settings = [];

    use Placeholder, Required, Description, DefaultValue, FieldAccess, Multiple, Clonable, Sortable;

    public function __construct(protected string $name, protected string $id)
    {
    }

    public static function make(string $name, string $id): static
    {
        return new static($name, $id);
    }

    public function build(): array
    {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'id' => $this->id,
        ] + $this->settings;
    }
}
