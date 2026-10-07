<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Enums\TextareaWrap;
use Pollora\Metabox\Fields\Settings\AutocompleteAttribute;
use Pollora\Metabox\Fields\Settings\GeoBinding;
use Pollora\Metabox\Fields\Settings\SeoAnalysis;
use Pollora\Metabox\Fields\Settings\TextLength;
use Pollora\Metabox\Fields\Settings\TextLimiter;
use Pollora\Metabox\Validation\OptionValidation;

/**
 * Text field class for creating text input fields.
 */
class Textarea extends Field
{
    use AutocompleteAttribute;
    use GeoBinding;
    use SeoAnalysis;
    use TextLength;
    use TextLimiter;

    /**
     * The type of the field.
     */
    protected string $type = 'textarea';

    /**
     * The number of columns for the textarea.
     */
    protected int $cols = 60;

    /**
     * The number of rows for the textarea.
     */
    protected int $rows = 4;

    /**
     * How the text wraps when the form is submitted.
     */
    protected string $wrap;

    /**
     * Set the number of columns for the textarea.
     *
     * @param  int  $cols  The number of columns.
     * @return static Returns the instance of the Textarea class for method chaining.
     */
    public function cols(int $cols): static
    {
        $this->cols = $cols;

        return $this;
    }

    /**
     * Set the number of rows for the textarea.
     *
     * @param  int  $rows  The number of rows.
     * @return static Returns the instance of the Textarea class for method chaining.
     */
    public function rows(int $rows): static
    {
        $this->rows = $rows;

        return $this;
    }

    /**
     * Set how the text wraps when the form is submitted: 'soft' (default), 'hard'
     * (line breaks are added, requires cols()) or 'off'.
     */
    public function wrap(string|TextareaWrap $wrap): static
    {
        $this->wrap = OptionValidation::check($wrap, TextareaWrap::class);

        return $this;
    }
}
