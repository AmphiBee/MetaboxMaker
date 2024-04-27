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

namespace AmphiBee\MetaboxMaker\Fields\Settings;

trait Description
{

    public function description(string $description): static
    {
        $this->settings['desc'] = $description;
        return $this;
    }

    public function labelDescription(string $labelDescription): static
    {
        $this->settings['label_description'] = $labelDescription;
        return $this;
    }
}
