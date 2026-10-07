<?php

declare(strict_types=1);

namespace Pollora\Metabox\Services;

/**
 * Service for filtering blocks by post type
 */
class BlockTypeFilter
{
    /**
     * Stored restrictions for blocks
     */
    protected static array $restrictions = [];

    /**
     * Flag to track if filter has been added
     */
    protected static bool $filterAdded = false;

    /**
     * Register a block's post type restrictions
     *
     * @param  string  $blockId  The block identifier
     * @param  array  $restrictions  The restrictions configuration
     */
    public static function registerRestrictions(string $blockId, array $restrictions): void
    {
        self::$restrictions[$blockId] = array_merge(self::$restrictions[$blockId] ?? [], $restrictions);
        self::setupFilter();
    }

    /**
     * Filter blocks based on post type restrictions
     *
     * @param  mixed  $allowed_blocks  List of allowed blocks
     * @param  object  $context  Editor context
     * @return mixed Filtered list of allowed blocks
     */
    public static function filterBlockTypes($allowed_blocks, $context): mixed
    {
        if (! isset($context->post) || empty(self::$restrictions)) {
            return $allowed_blocks;
        }

        $post_type = $context->post->post_type;

        if ($allowed_blocks === true) {
            $registry = \WP_Block_Type_Registry::get_instance();
            $allowed_blocks = array_keys($registry->get_all_registered());
        }

        if (! is_array($allowed_blocks)) {
            return $allowed_blocks;
        }

        $filtered_blocks = [];

        foreach ($allowed_blocks as $block_name) {
            $should_keep = true;

            foreach (self::$restrictions as $block_id => $restrictions) {
                if ($block_name !== self::blockName($block_id)) {
                    continue;
                }

                if (isset($restrictions['allowed']) && ! in_array($post_type, $restrictions['allowed'], true)) {
                    $should_keep = false;
                    break;
                }

                if (isset($restrictions['excluded']) && in_array($post_type, $restrictions['excluded'], true)) {
                    $should_keep = false;
                    break;
                }
            }

            if ($should_keep) {
                $filtered_blocks[] = $block_name;
            }
        }

        return $filtered_blocks;
    }

    /**
     * Get the registered block name for a Meta Box block ID, as MB Blocks does.
     */
    public static function blockName(string $blockId): string
    {
        return 'meta-box/'.sanitize_title($blockId);
    }

    /**
     * Get the registered restrictions, keyed by block ID.
     */
    public static function getRestrictions(): array
    {
        return self::$restrictions;
    }

    /**
     * Setup the WordPress filter for block types
     */
    protected static function setupFilter(): void
    {
        if (! self::$filterAdded) {
            add_filter('allowed_block_types_all', [self::class, 'filterBlockTypes'], 99999, 2);
            self::$filterAdded = true;
        }
    }
}
