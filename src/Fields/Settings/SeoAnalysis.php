<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait for adding the field content to the SEO analysis of Yoast SEO and
 * Rank Math (MB Yoast SEO, MB Rank Math).
 */
trait SeoAnalysis
{
    /**
     * Whether Yoast SEO analyzes the field content.
     */
    protected bool $add_to_wpseo_analysis;

    /**
     * Whether Rank Math analyzes the field content.
     */
    protected bool $rank_math_analysis;

    /**
     * Add the field content to the content analyzed by Yoast SEO or Rank Math.
     */
    public function seoAnalysis(bool $analyze = true): static
    {
        $this->add_to_wpseo_analysis = $analyze;
        $this->rank_math_analysis = $analyze;

        return $this;
    }
}
