# Upload Fields in MetaboxMaker

MetaboxMaker provides a variety of fields specifically designed for handling file uploads. This document covers the upload-specific fields available in the package and how to use them.

## File Field

The `File` field is used to handle file uploads. It uses several traits to provide additional configuration options for file handling.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\File;

File::make('Upload File', 'upload_file')
    ->forceDelete(true)
    ->maxFileUpload(5)
    ->uniqueFilenameCallback(function($filename) {
        return uniqid() . '-' . $filename;
    })
    ->uploadDir('/custom/upload/dir');
```

### Methods

- **`forceDelete(bool $forceDelete = true)`**: Sets whether to force delete files when removed.
- **`maxFileUpload(int $maxFiles)`**: Sets the maximum number of files that can be uploaded.
- **`uniqueFilenameCallback(callable $callback)`**: Sets a callback function to generate unique filenames.
- **`uploadDir(string $dir)`**: Sets the custom upload directory.

## FileAdvanced Field

The `FileAdvanced` field is an extension of the `File` field, providing more advanced file handling options.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\FileAdvanced;

FileAdvanced::make('Upload Advanced File', 'upload_advanced_file')
    ->forceDelete(true)
    ->maxFileUpload(10)
    ->maxStatus(true)
    ->mimeType(['image/jpeg', 'image/png']);
```

### Methods

- **`forceDelete(bool $forceDelete = true)`**: Sets whether to force delete files when removed.
- **`maxFileUpload(int $maxFiles)`**: Sets the maximum number of files that can be uploaded.
- **`maxStatus(bool $maxStatus = true)`**: Sets whether to display the maximum file upload status.
- **`mimeType(array $mimeTypes)`**: Sets the allowed MIME types for file uploads.

## FileInput Field

The `FileInput` field is used to create a simple text input for uploading a single file.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\FileInput;

FileInput::make('Upload Single File', 'upload_single_file');
```

### Methods

- This field does not have additional methods beyond those inherited from the `Field` class.

## FileUpload Field

The `FileUpload` field is an extension of the `FileAdvanced` field, providing additional options for file size.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\FileUpload;

FileUpload::make('Upload File with Size Limit', 'upload_file_size_limit')
    ->forceDelete(true)
    ->maxFileUpload(5)
    ->maxFileSize(1048576); // 1MB in bytes
```

### Methods

- **`forceDelete(bool $forceDelete = true)`**: Sets whether to force delete files when removed.
- **`maxFileUpload(int $maxFiles)`**: Sets the maximum number of files that can be uploaded.
- **`maxFileSize(int $sizeInBytes)`**: Sets the maximum file size allowed for uploads.

## Image Field

The `Image` field is used to handle image uploads. It extends the `File` field.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Image;

Image::make('Upload Image', 'upload_image')
    ->forceDelete(true)
    ->maxFileUpload(5);
```

### Methods

- Inherits all methods from the `File` field.

## ImageAdvanced Field

The `ImageAdvanced` field is an extension of the `Image` field, providing more advanced image handling options.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\ImageAdvanced;

ImageAdvanced::make('Upload Advanced Image', 'upload_advanced_image')
    ->imageSize('thumbnail')
    ->maxStatus(true)
    ->newImagePlacement('beginning');
```

### Methods

- **`imageSize(string $size)`**: Sets the image size for display.
- **`maxStatus(bool $maxStatus = true)`**: Sets whether to display the maximum file upload status.
- **`newImagePlacement(string $position)`**: Sets the placement of new images ('beginning' or 'end').

## SingleImage Field

The `SingleImage` field is used to handle single image uploads. It extends the `Image` field.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\SingleImage;

SingleImage::make('Upload Single Image', 'upload_single_image')
    ->forceDelete(true)
    ->imageSize('medium');
```

### Methods

- **`forceDelete(bool $forceDelete = true)`**: Sets whether to force delete files when removed.
- **`imageSize(string $size)`**: Sets the image size for display.

## ImageUpload Field

The `ImageUpload` field is an extension of the `ImageAdvanced` field, providing additional options for file size and upload control.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\ImageUpload;

ImageUpload::make('Upload Image with Size Limit', 'upload_image_size_limit')
    ->forceDelete(true)
    ->maxFileUpload(5)
    ->maxFileSize(1048576); // 1MB in bytes
```

### Methods

- **`forceDelete(bool $forceDelete = true)`**: Sets whether to force delete files when removed.
- **`maxFileUpload(int $maxFiles)`**: Sets the maximum number of files that can be uploaded.
- **`maxFileSize(int $sizeInBytes)`**: Sets the maximum file size allowed for uploads.

## Video Field

The `Video` field is used to handle video uploads. It provides options for file upload control.

### Example

```php
<?php

use AmphiBee\MetaboxMaker\Fields\Video;

Video::make('Upload Video', 'upload_video')
    ->forceDelete(true)
    ->maxFileUpload(3)
    ->maxStatus(true);
```

### Methods

- **`forceDelete(bool $forceDelete = true)`**: Sets whether to force delete files when removed.
- **`maxFileUpload(int $maxFiles)`**: Sets the maximum number of files that can be uploaded.
- **`maxStatus(bool $maxStatus = true)`**: Sets whether to display the maximum file upload status.

---

**Previous :** [WordPress Fields](WordPress.md)  
**Next :** [Layout Fields](Layout.md) 