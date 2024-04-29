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

use AmphiBee\MetaboxMaker\Enums\InputTextType;
use AmphiBee\MetaboxMaker\Helpers\OptionValidator;

class Text extends Field
{
    protected string $type = 'text';

    protected int $size = 0; // Default size set to 0, assuming no default size is needed

    protected string $prepend = '';

    protected string $append = '';

    protected array $datalist = [];

    public function type(string|InputTextType $type): static
    {
        $this->type = OptionValidator::check($type, InputTextType::class);

        return $this;
    }

    public function size(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function prepend(string $text): static
    {
        $this->prepend = $text;

        return $this;
    }

    public function append(string $text): static
    {
        $this->append = $text;

        return $this;
    }

    public function datalist(string $id, array $options): static
    {
        $this->datalist = [
            'id' => $id,
            'options' => $options,
        ];

        return $this;
    }
}
