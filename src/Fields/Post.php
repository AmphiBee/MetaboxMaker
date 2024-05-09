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

use AmphiBee\MetaboxMaker\Enums\EntityFieldType;
use AmphiBee\MetaboxMaker\Fields\Settings\Ajax;
use AmphiBee\MetaboxMaker\Validation\OptionValidation;

/**
 * Post field class for creating fields that allow selecting posts.
 */
class Post extends Field
{
    use Ajax;

    /**
     * The type of field.
     */
    protected string $type = 'post';

    /**
     * The type of post to select.
     */
    protected string|array $post_type = 'post';

    /**
     * The arguments to pass to the WP_Query function.
     */
    protected array $query_args;

    /**
     * Whether the field should allow selecting parent posts.
     */
    protected bool $parent;

    /**
     * The type of field.
     */
    protected string $field_type = 'select';

    /**
     * Set the type of post to select.
     *
     * @param  string|array  $postType  The type of post to select.
     */
    public function postType(string|array $postType): static
    {
        $this->post_type = $postType;

        return $this;
    }

    /**
     * Set the arguments to pass to the WP_Query function.
     *
     * @param  array  $queryArgs  The arguments to pass to the WP_Query function.
     */
    public function queryArgs(array $queryArgs): static
    {
        $this->query_args = $queryArgs;

        return $this;
    }

    /**
     * Set whether the field should allow selecting parent posts.
     *
     * @param  bool  $parent  Whether the field should allow selecting parent posts.
     */
    public function setAsParent(bool $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Set the type of field.
     *
     * @param  EntityFieldType|string  $fieldType  The type of field.
     */
    public function fieldType(EntityFieldType|string $fieldType): static
    {
        $this->field_type = OptionValidation::check($fieldType, EntityFieldType::class);

        return $this;
    }
}
