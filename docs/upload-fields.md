# Upload fields

There are two families of upload fields:

- **Media library fields** select or upload files with the WordPress media library: `FileAdvanced`, `FileUpload`, `ImageAdvanced`, `ImageUpload`, `SingleImage` and `Video`. They share the [media settings](#media-settings).
- **Classic upload fields** use a plain file input: `File` and `Image`. Files are added to the media library, or uploaded to a custom directory with `uploadDir()`.

`FileInput` is a text input for one file URL, typed or picked from the media library.

## Media settings

`FileAdvanced`, `FileUpload`, `ImageAdvanced`, `ImageUpload`, `SingleImage` and `Video` share these settings:

- **`maxFileUploads(int $max)`**: Sets the maximum number of files.
- **`showMaxStatus(bool $show = true)`**: Shows how many files can still be added.
- **`mimeType(string $type)`**: Restricts the files to a MIME type, e.g. `application/pdf` or `image/jpeg,image/png`.
- **`addTo(string|MediaPlacement $placement)`**: Sets where new files are added: at the `end` (default) or at the `beginning`.
- **`forceDelete(bool $force = true)`**: Deletes the files from the media library when they are removed from the field. A file used elsewhere is deleted too.

## FileAdvanced Field

The `FileAdvanced` field selects or uploads files with the media library.

### Example

```php
<?php

use Pollora\Metabox\Fields\FileAdvanced;

FileAdvanced::make('Brochures', 'brochures')
    ->maxFileUploads(10)
    ->mimeType('application/pdf');
```

### Methods

See the [media settings](#media-settings).

## FileUpload Field

The `FileUpload` field is a drag and drop area uploading files to the media library.

### Example

```php
<?php

use Pollora\Metabox\Fields\FileUpload;

FileUpload::make('Attachments', 'attachments')
    ->maxFileUploads(5)
    ->maxFileSize('10mb');
```

### Methods

- **`maxFileSize(int|string $max)`**: Sets the maximum file size, in bytes or with a unit: `500kb`, `10mb`, `1gb`.
- The [media settings](#media-settings).

## ImageAdvanced Field

The `ImageAdvanced` field selects or uploads images with the media library.

### Example

```php
<?php

use Pollora\Metabox\Enums\MediaPlacement;
use Pollora\Metabox\Fields\ImageAdvanced;

ImageAdvanced::make('Gallery', 'gallery')
    ->imageSize('thumbnail')
    ->addTo(MediaPlacement::Beginning);
```

### Methods

- **`imageSize(string $size)`**: Sets the image size displayed in the field, e.g. `thumbnail` or `medium`.
- The [media settings](#media-settings).

## ImageUpload Field

The `ImageUpload` field is a drag and drop area uploading images to the media library.

### Example

```php
<?php

use Pollora\Metabox\Fields\ImageUpload;

ImageUpload::make('Photos', 'photos')
    ->maxFileUploads(5)
    ->maxFileSize('2mb');
```

### Methods

- **`imageSize(string $size)`**: Sets the image size displayed in the field.
- **`maxFileSize(int|string $max)`**: Sets the maximum file size, in bytes or with a unit.
- The [media settings](#media-settings).

## SingleImage Field

The `SingleImage` field selects one image with the media library.

### Example

```php
<?php

use Pollora\Metabox\Fields\SingleImage;

SingleImage::make('Cover', 'cover')
    ->imageSize('medium');
```

### Methods

- **`imageSize(string $size)`**: Sets the image size displayed in the field.
- The [media settings](#media-settings).

## Video Field

The `Video` field selects or uploads videos with the media library.

### Example

```php
<?php

use Pollora\Metabox\Fields\Video;

Video::make('Videos', 'videos')
    ->maxFileUploads(3)
    ->showMaxStatus();
```

### Methods

See the [media settings](#media-settings).

## File Field

The `File` field uploads files with a plain file input. They are added to the media library, unless `uploadDir()` sets a custom directory.

### Example

```php
<?php

use Pollora\Metabox\Fields\File;

File::make('Contract', 'contract')
    ->maxFileUploads(1)
    ->mimeType('application/pdf')
    ->uploadDir(WP_CONTENT_DIR.'/contracts')
    ->uniqueFilenameCallback(fn (string $dir, string $name, string $ext) => uniqid().$ext);
```

### Methods

- **`maxFileUploads(int $max)`**: Sets the maximum number of files.
- **`mimeType(string $type)`**: Restricts the files to a MIME type.
- **`forceDelete(bool $force = true)`**: Deletes the files from the media library when they are removed from the field.
- **`uploadDir(string $dir)`**: Uploads the files to a custom directory instead of the media library. The absolute path must be inside the WordPress directory (`ABSPATH`): Meta Box ignores the upload otherwise.
- **`uniqueFilenameCallback(callable $callback)`**: Sets the callback naming the uploaded files in a custom directory. It receives the directory, the file name and the extension, like the callback of `wp_unique_filename()`.

## Image Field

The `Image` field uploads images with a plain file input, like the `File` field.

### Example

```php
<?php

use Pollora\Metabox\Fields\Image;

Image::make('Logo', 'logo')
    ->maxFileUploads(1)
    ->imageSize('thumbnail');
```

### Methods

- **`imageSize(string $size)`**: Sets the image size displayed in the field.
- The methods of the `File` field.

## FileInput Field

The `FileInput` field is a text input for one file URL: typed, even for a file hosted elsewhere, or picked from the media library. It saves the URL.

### Example

```php
<?php

use Pollora\Metabox\Fields\FileInput;

FileInput::make('Download', 'download');
```

### Methods

This field only has the [common field settings](common-settings.md).

---

**Previous:** [WordPress fields](wordpress-fields.md)  
**Next:** [Layout fields](layout-fields.md)
