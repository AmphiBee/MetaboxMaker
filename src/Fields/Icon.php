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

/**
 * Autocomplete field class for creating input fields with autocomplete functionality.
 */
class Icon extends SelectAdvanced
{
    /**
     * The type of input field. Set to 'icon'.
     */
    protected string $type = 'icon';

    /**
     * Specifies the icon set to use.
     */
    protected ?string $icon_set = null;

    /**
     * Path to the icon file or icon configuration.
     */
    protected ?string $icon_file = null;

    /**
     * URL to the CSS file for the icons, or a callable function for enqueuing scripts.
     *
     * @var string|callable|null
     */
    protected $icon_css;

    /**
     * Directory path containing icon files.
     */
    protected ?string $icon_dir = null;

    /**
     * Set the icon set.
     *
     * @param  string  $icon_set  Icon set name.
     */
    public function iconSet(string $icon_set): static
    {
        $this->icon_set = $icon_set;

        return $this;
    }

    /**
     * Set the icon file path.
     *
     * @param  string  $icon_file  Path to the icon file.
     */
    public function iconFile(string $icon_file): static
    {
        $this->icon_file = $icon_file;

        return $this;
    }

    /**
     * Set the CSS or script setup for the icons.
     *
     * @param  string|callable  $icon_css  URL to the CSS file or callable function.
     */
    public function iconCss($icon_css): static
    {
        $this->icon_css = $icon_css;

        return $this;
    }

    /**
     * Set the directory containing icons.
     *
     * @param  string  $icon_dir  Directory path.
     */
    public function iconDir(string $icon_dir): static
    {
        $this->icon_dir = $icon_dir;

        return $this;
    }
}
