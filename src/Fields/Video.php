<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Fields\Settings\ForceDelete;
use Pollora\Metabox\Fields\Settings\MaxFileUpload;
use Pollora\Metabox\Fields\Settings\MaxStatus;

/**
 * Video field class for handling video uploads.
 */
class Video extends Field
{
    use ForceDelete, MaxFileUpload, MaxStatus;

    /**
     * The type of field.
     */
    protected string $type = 'video';
}
