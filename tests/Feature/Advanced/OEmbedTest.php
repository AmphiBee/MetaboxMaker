<?php

declare(strict_types=1);

use Pollora\Metabox\Fields\OEmbed;

test('oembed field can be configured with specific settings', function () {
    $oEmbedField = new OEmbed('Embed Media', 'embed_media');
    $oEmbedField->size(30)
        ->notAvailableText('<p>Media cannot be displayed.</p>');

    $config = $oEmbedField->build();

    expect($config)->toMatchArray([
        'type' => 'oembed',
        'name' => 'Embed Media',
        'id' => 'embed_media',
        'size' => 30,
        'not_available_string' => '<p>Media cannot be displayed.</p>',
    ]);
});
