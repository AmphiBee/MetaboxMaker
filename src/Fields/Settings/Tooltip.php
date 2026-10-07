<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

use Pollora\Metabox\Enums\TooltipPosition;
use Pollora\Metabox\Validation\OptionValidation;

/**
 * Trait for showing a tooltip next to the field label (Meta Box Tooltip).
 */
trait Tooltip
{
    /**
     * The tooltip content, or its full settings.
     */
    protected string|array $tooltip;

    /**
     * Show a tooltip next to the field label.
     *
     * @param  string  $content  The tooltip content.
     * @param  string|null  $icon  'info' (default), 'help', a Dashicons name or an image URL.
     * @param  string|TooltipPosition|null  $position  'top' (default), 'bottom', 'left' or 'right'.
     * @param  bool  $allowHtml  Whether the content is rendered as HTML.
     */
    public function tooltip(string $content, ?string $icon = null, string|TooltipPosition|null $position = null, bool $allowHtml = false): static
    {
        $settings = array_filter([
            'content' => $content,
            'icon' => $icon,
            'position' => $position === null ? null : OptionValidation::check($position, TooltipPosition::class),
            'allow_html' => $allowHtml ?: null,
        ], fn ($value) => $value !== null);

        $this->tooltip = count($settings) === 1 ? $content : $settings;

        return $this;
    }
}
