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
use AmphiBee\MetaboxMaker\Validation\OptionValidation;

/**
 * Text field class for creating text input fields.
 */
class Text extends Field
{
    /**
     * The type of input field. Defaults to 'text'.
     */
    protected string $type = 'text';

    /**
     * The size of the input field.
     */
    protected int $size;

    /**
     * The text to prepend to the input field.
     */
    protected string $prepend;

    /**
     * The text to append to the input field.
     */
    protected string $append;

    /**
     * The datalist options for the input field.
     */
    protected array $datalist;

    /**
     * Set the type of input field.
     *
     * @param  string|InputTextType  $type  The type of input field.
     * @return static Returns the instance of the Text class for method chaining.
     */
    public function type(string|InputTextType $type): static
    {
        $this->type = OptionValidation::check($type, InputTextType::class);

        return $this;
    }

    /**
     * Set the size of the input field.
     *
     * @param  int  $size  The size of the input field.
     * @return static Returns the instance of the Text class for method chaining.
     */
    public function size(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Set the text to prepend to the input field.
     *
     * @param  string  $text  The text to prepend.
     * @return static Returns the instance of the Text class for method chaining.
     */
    public function prepend(string $text): static
    {
        $this->prepend = $text;

        return $this;
    }

    /**
     * Set the text to append to the input field.
     *
     * @param  string  $text  The text to append.
     * @return static Returns the instance of the Text class for method chaining.
     */
    public function append(string $text): static
    {
        $this->append = $text;

        return $this;
    }

    /**
     * Set the datalist options for the input field.
     *
     * @param  string  $id  The ID of the datalist.
     * @param  array  $options  The options for the datalist.
     * @return static Returns the instance of the Text class for method chaining.
     */
    public function datalist(string $id, array $options): static
    {
        $this->datalist = [
            'id' => $id,
            'options' => $options,
        ];

        return $this;
    }
}
