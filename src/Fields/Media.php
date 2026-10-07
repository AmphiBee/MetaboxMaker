<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields;

use Pollora\Metabox\Enums\MediaPlacement;
use Pollora\Metabox\Fields\Settings\ForceDelete;
use Pollora\Metabox\Fields\Settings\MaxFileUpload;
use Pollora\Metabox\Fields\Settings\MaxStatus;
use Pollora\Metabox\Fields\Settings\MimeType;
use Pollora\Metabox\Validation\OptionValidation;

/**
 * Base class for the fields selecting files from the WordPress media library:
 * file_advanced, file_upload, image_advanced, image_upload, single_image and video.
 */
abstract class Media extends Field
{
    use ForceDelete, MaxFileUpload, MaxStatus, MimeType;

    /**
     * Where new files are added in the list.
     */
    protected string $add_to;

    /**
     * Set where new files are added in the list: at the end (default) or at the beginning.
     */
    public function addTo(string|MediaPlacement $placement): static
    {
        $this->add_to = OptionValidation::check($placement, MediaPlacement::class);

        return $this;
    }
}
