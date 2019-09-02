<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Public key for use in M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may specify the public key provided by Vodacom to you
    |
    */
    'public_key' => env('MPESA_PUBLIC_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | API host of M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may specify the API host provided by Vodacom for API operations
    |
    */
    'api_host' => env('MPESA_API_HOST', 'api.sandbox.vm.co.mz'),

    /*
    |--------------------------------------------------------------------------
    | API Key of M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may specify the API key provided by Vodacom to you
    |
    */
    'api_key' => env('MPESA_API_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | Origin of M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may specify the API key provided by Vodacom to you
    |
    */
    'origin' => env('MPESA_ORIGIN', null),

    /*
    |--------------------------------------------------------------------------
    | Service Provider Code of M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may specify the service provider code of M-Pesa provided by Vodacom to you
    |
    */
    'service_provider_code' => env('MPESA_SERVICE_PROVIDER_CODE', null),

    /*
    |--------------------------------------------------------------------------
    | Initiator Identifier of M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may the initiator identifier provided by Vodacom to you
    |
    */
    'initiator_identifier' => env('MPESA_INITIATOR_IDENTIFIER', null),

    /*
    |--------------------------------------------------------------------------
    | Security credential of M-Pesa API
    |--------------------------------------------------------------------------
    |
    | Here you may specify the security credential provided by Vodacom to you
    |
    */
    'security_credential' => env('MPESA_SECURITY_CREDENTIAL', null)
];
