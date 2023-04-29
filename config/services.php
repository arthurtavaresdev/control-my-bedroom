<?php

return [
    'tuya' => [
        'accessKey' => env('TUYA_ACCESS_KEY'),
        'secretKey' => env('TUYA_ACCESS_SECRET'),
        'baseUrl' => 'https://openapi.tuyaus.com',
        'debug' => env('TUYA_DEBUG', false),

        // @todo: support multiple devices
        'device_id' => env('TUYA_DEVICE_ID'),
    ],
];
