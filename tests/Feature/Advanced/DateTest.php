<?php
use AmphiBee\MetaboxMaker\Fields\DatetimePicker;
use AmphiBee\MetaboxMaker\Fields\Datepicker;

test('date field can be configured correctly', function () {
    $dateField = DatetimePicker::make('Event Date', 'event_date');
    $dateField->size(15)
        ->inline(true)
        ->saveAsTimestamp(true)
        ->jsOptions([
            'stepMinute'      => 15,
            'showTimepicker'  => true,
            'controlType'     => 'select',
            'showButtonPanel' => false,
            'oneLine'         => true,
        ])
        ->saveFormat('Y-m-d');

    $config = $dateField->build();

    expect($config)->toMatchArray([
        'type' => 'datetime',
        'name' => 'Event Date',
        'id' => 'event_date',
        'size' => 15,
        'inline' => true,
        'timestamp' => true,
        'js_options' => [
            'stepMinute'      => 15,
            'showTimepicker'  => true,
            'controlType'     => 'select',
            'showButtonPanel' => false,
            'oneLine'         => true,
        ],
        'save_format' => 'Y-m-d'
    ]);
});


test('can configure date picker with specific settings', function () {
    $jsOptions = [
        'dateFormat' => 'yy-mm-dd',
        'firstDay' => 1  // Monday as first day of week
    ];

    $args = DatePicker::make('Event Date', 'event_date')
        ->size(15)
        ->inline(true)
        ->saveAsTimestamp(true)
        ->jsOptions($jsOptions)
        ->saveFormat('Y-m-d')
        ->build();

    expect($args)->toMatchArray([
        'type' => 'date',
        'name' => 'Event Date',
        'id' => 'event_date',
        'size' => 15,
        'inline' => true,
        'timestamp' => true,
        'js_options' => $jsOptions,
        'save_format' => 'Y-m-d'
    ]);
});
