<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Enums\InputTextType;
use Pollora\Metabox\Fields\Settings\InputTooltip;
use Pollora\Metabox\Fields\Settings\SeoAnalysis;
use Pollora\Metabox\Fields\Settings\TextLimiter;
use Pollora\Metabox\Validation\OptionValidation;

/**
 * Text field class for creating text input fields.
 */
class Text extends Input
{
    use InputTooltip;
    use SeoAnalysis;
    use TextLimiter;

    /**
     * The type of input field. Defaults to 'text'.
     */
    protected string $type = 'text';

    /**
     * Set the type of input field.
     *
     * @param  string|InputTextType  $type  The type of input field.
     * @return static Returns the instance of the Text class for method chaining.
     */
    public function type(string|InputTextType $type): static
    {
        $this->type = OptionValidation::check($type, InputTextType::class);

        if (isset($this->tooltip_input)) {
            self::ensureInputTooltipSupported($this->type);
        }

        return $this;
    }
}
