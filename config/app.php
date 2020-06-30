<?php

return [
    'name' => env('APP_NAME'),
    
    'env' => env('APP_ENV', 'production'),
    
    'api_key' => env('APP_API_KEY'),

    'whitelist' => env('APP_IP_WHITELIST'),

    'debug' => env('APP_DEBUG', true),

    'partner_restriction' => env('APP_PARTNER_RESTRICTION', true),
    
    'search_cache_lifetime' => 10,
    
    /*
     * Services
     */
    
    'services' => [
        'afrikpay' => [
            'url' => env('AFRIKPAY_URL'),
            'status_url' => env('AFRIKPAY_STATUS_URL'),
            'key' => env('AFRIKPAY_KEY'),
            'pwd' => env('AFRIKPAY_PWD'),
            'platform' => env('AFRIKPAY_PLATFORM'),
            
            'mtn_code'  => env('SERVICE_AFRIKPAY_MTN_CODE'),
            'orange_code' => env('SERVICE_AFRIKPAY_ORANGE_CODE'),
            'yoomee_code' => env('SERVICE_AFRIKPAY_YOOMEE_CODE'),
            'nexttel_code' => env('SERVICE_AFRIKPAY_NEXTTEL_CODE'),
            'camtel_code' => env('SERVICE_AFRIKPAY_CAMTEL_CODE'),
        ]
    ]
];