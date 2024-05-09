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
 * Taxonomy field class for creating fields that allow selecting terms.
 */
class Taxonomy extends Field
{
    use Ajax;

    /**
     * The type of field.
     */
    protected string $type = 'taxonomy';

    /**
     * The type of taxonomy to select.
     */
    protected string|array $taxonomies = 'category';

    /**
     * The arguments to pass to the WP_Term_Query function.
     */
    protected array $query_args;

    /**
     * Allow users to create a new term when submitting the post.
     */
    protected bool $add_new;

    /**
     * Remove the default WordPress taxonomy meta box. Only works with the classic editor.
     */
    protected bool $remove_default;

    /**
     * The type of field.
     */
    protected string $field_type = 'select';

    /**
     * Set the type of taxomies to select.
     *
     * @param  string|array  $taxonomies  The type of post to select.
     */
    public function taxonomies(string|array $taxonomies): static
    {
        $this->taxonomies = $taxonomies;

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
     * Allow users to create a new term when submitting the post.
     *
     * @param  bool  $addNew  Defaults to true.
     */
    public function addNew(bool $addNew = true): static
    {
        $this->add_new = $addNew;

        return $this;
    }

    /**
     * Remove the default WordPress taxonomy meta box. Only works with the classic editor.
     *
     * @param  bool  $removeDefault  Defaults to true.
     */
    public function removeDefault(bool $removeDefault = true): static
    {
        $this->remove_default = $removeDefault;

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
