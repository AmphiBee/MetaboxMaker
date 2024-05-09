<?php
use AmphiBee\MetaboxMaker\Fields\Timepicker;
test('timepicker field can be configured with specific settings', function () {
    $timepicker = Timepicker::make('Appointment Time', 'appointment_time');
    $timepicker->hourMax(23)
        ->minuteMax(59)
        ->showMinute(true)
        ->stepMinute(15)
        ->timeOnly(false)
        ->currentText('Now')
        ->closeText('Close');

    $config = $timepicker->build();

    expect($config)->toMatchArray([
        'type' => 'time',
        'name' => 'Appointment Time',
        'id' => 'appointment_time',
        'js_options' => [
            'hourMax' => 23,
            'minuteMax' => 59,
            'showMinute' => true,
            'stepMinute' => 15,
            'timeOnly' => false,
            'currentText' => 'Now',
            'closeText' => 'Close'
        ]
    ]);
});
