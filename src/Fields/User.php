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
 * User field class for creating fields that allow selecting users.
 *
 * @package AmphiBee\MetaboxMaker\Fields
 */
class User extends Field
{
    protected string $type = 'user';

    protected array $query_args;

    protected string $field_type = 'select';

    public function queryArgs(array $queryArgs): static
    {
        $this->query_args = $queryArgs;
        return $this;
    }

    public function fieldType(EntityFieldType|string $fieldType): static
    {
        $this->field_type = OptionValidation::check($fieldType, EntityFieldType::class);
        return $this;
    }
}
