<?php

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker;

/**
 * Class for creating Gutenberg blocks.
 */
class Block extends Metabox
{
    /**
     * The block type.
     */
    protected string $type = 'block';
    /**
     * The block title.
     */
    protected string $title = '';

    /**
     * The block ID.
     */
    protected string $id = '';

    /**
     * The block version.
     */
    protected string $version;

    /**
     * The icon of the block.
     */
    protected string|array $icon = 'awards';

    /**
     * The category of the block.
     */
    protected string $category = 'layout';

    /**
     * The keywords for the block.
     */
    protected array $keywords = [];

    /**
     * The render template path for the block.
     */
    protected string $render_template;

    /**
     * The enqueue style URL for the block.
     */
    protected string $enqueue_style;

    /**
     * The enqueue script URL for the block.
     */
    protected string $enqueue_script;

    /**
     * The supports options for the block.
     */
    protected array $supports;

    /**
     * The default mode of the block.
     */
    protected string $mode;

    /**
     * The render callback for the block.
     */
    protected $render_callback;

    /**
     * The enqueue assets callback for the block.
     */
    protected $enqueue_assets;

    /**
     * The preview data for the block.
     */
    protected array $preview = [];

    /**
     * The storage type for the block fields.
     */
    protected string $storage_type;

    /**
     * Set the block version.
     *
     * @param string $version The block version.
     * @return static
     */
    public function version(string $version): static
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Set the icon of the block.
     *
     * @param string|array $icon The icon of the block.
     * @return static
     */
    public function icon(string|array $icon): static
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Set the category of the block.
     *
     * @param string $category The category of the block.
     * @return static
     */
    public function category(string $category): static
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Set the keywords for the block.
     *
     * @param array $keywords The keywords for the block.
     * @return static
     */
    public function keywords(array $keywords): static
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * Set the render template path for the block.
     *
     * @param string $renderTemplate The render template path.
     * @return static
     */
    public function renderTemplate(string $renderTemplate): static
    {
        $this->render_template = $renderTemplate;
        return $this;
    }

    /**
     * Set the enqueue style URL for the block.
     *
     * @param string $enqueueStyle The enqueue style URL.
     * @return static
     */
    public function enqueueStyle(string $enqueueStyle): static
    {
        $this->enqueue_style = $enqueueStyle;
        return $this;
    }

    /**
     * Set the enqueue script URL for the block.
     *
     * @param string $enqueueScript The enqueue script URL.
     * @return static
     */
    public function enqueueScript(string $enqueueScript): static
    {
        $this->enqueue_script = $enqueueScript;
        return $this;
    }

    /**
     * Set the supports options for the block.
     *
     * @param array $supports The supports options for the block.
     * @return static
     */
    public function supports(array $supports): static
    {
        $this->supports = $supports;
        return $this;
    }

    /**
     * Set the default mode of the block.
     *
     * @param string $mode The default mode of the block.
     * @return static
     */
    public function mode(string $mode): static
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * Set the render callback for the block.
     *
     * @param callable $renderCallback The render callback.
     * @return static
     */
    public function renderCallback(callable $renderCallback): static
    {
        $this->render_callback = $renderCallback;
        return $this;
    }

    /**
     * Set the enqueue assets callback for the block.
     *
     * @param callable $enqueueAssets The enqueue assets callback.
     * @return static
     */
    public function enqueueAssets(callable $enqueueAssets): static
    {
        $this->enqueue_assets = $enqueueAssets;
        return $this;
    }

    /**
     * Set the preview data for the block.
     *
     * @param array $preview The preview data.
     * @return static
     */
    public function preview(array $preview): static
    {
        $this->preview = $preview;
        return $this;
    }

    /**
     * Set the storage type for the block fields.
     *
     * @param string $storageType The storage type.
     * @return static
     */
    public function storageType(string $storageType): static
    {
        $this->storage_type = $storageType;
        return $this;
    }
}
