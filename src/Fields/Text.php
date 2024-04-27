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

use AmphiBee\MetaboxMaker\Fields\Options\InputTextType;
use AmphiBee\MetaboxMaker\Helpers\OptionValidator;

class Text extends Field {
    protected string $type = 'text';

    public function type(string|InputTextType $type): static {
        $this->type = OptionValidator::check($type, InputTextType::class);
        return $this;
    }

    public function size(int $size): static {
        $this->settings['size'] = $size;
        return $this;
    }

    public function prepend(string $text): static {
        $this->settings['prepend'] = $text;
        return $this;
    }

    public function append(string $text): static {
        $this->settings['append'] = $text;
        return $this;
    }

    public function datalist(string $id, array $options): static {
        $this->settings['datalist'] = [
            'id' => $id,
            'options' => $options
        ];
        return $this;
    }
}
