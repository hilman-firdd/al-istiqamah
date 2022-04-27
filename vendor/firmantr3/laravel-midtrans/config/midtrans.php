<?php 

return [

    'server_key' => env('MIDTRANS_SERVER_KEY', ''),

    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),

    'env' => env('MIDTRANS_ENV', ''),

    'sanitize' => env('MIDTRANS_SANITIZE', 'true'),

    '3ds' => env('MIDTRANS_3DS', 'false'),

    'curl_options' => [

    ],

];
