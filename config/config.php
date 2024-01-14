<?php

return [
    "default" => env('SMS_DRIVER', 'log'),

    "drivers" => [
        "log" => [
            "driver" => "log",
            'channel' => env('SMS_LOG_CHANNEL'),
            'options' => []
        ],
    ],
];