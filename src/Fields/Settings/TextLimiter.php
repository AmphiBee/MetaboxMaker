<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

use LogicException;

/**
 * Trait for limiting the length of a text, textarea or wysiwyg field (MB Text Limiter).
 */
trait TextLimiter
{
    /**
     * The maximum number of characters or words.
     */
    protected int $limit;

    /**
     * What the limit counts: character or word.
     */
    protected string $limit_type;

    /**
     * Limit the number of characters that can be entered.
     */
    public function maxCharacters(int $limit): static
    {
        return $this->setLimit($limit, 'character');
    }

    /**
     * Limit the number of words that can be entered.
     */
    public function maxWords(int $limit): static
    {
        return $this->setLimit($limit, 'word');
    }

    private function setLimit(int $limit, string $type): static
    {
        if (! in_array($this->type, ['text', 'textarea', 'wysiwyg'], true)) {
            throw new LogicException("MB Text Limiter only supports text, textarea and wysiwyg fields, not '{$this->type}'.");
        }

        $this->limit = $limit;
        $this->limit_type = $type;

        return $this;
    }
}
