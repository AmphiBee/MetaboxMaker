<?php
use AmphiBee\MetaboxMaker\Fields\CustomHtml;

test('custom html field stores static html content', function () {
    $htmlContent = '<div><p>Static HTML Content</p></div>';
    $customHtmlField = CustomHtml::make('Custom HTML', 'custom_html');
    $customHtmlField->content($htmlContent);

    expect($customHtmlField->build())->toMatchArray([
        'type' => 'custom_html',
        'name' => 'Custom HTML',
        'id' => 'custom_html',
        'std' => $htmlContent
    ]);
});

test('custom html field stores callback', function () {
    $callback = fn() => '<div><p>Dynamic Content</p></div>';
    $customHtmlField = CustomHtml::make('Custom HTML Callback', 'custom_html_callback');
    $customHtmlField->callback($callback);

    $builtField = $customHtmlField->build();
    expect($builtField['callback'])->toBe($callback);
});
