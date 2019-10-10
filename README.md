# Laravel Package for Vodacom Mozambique M-Pesa

This package is a wrapper for abdulmueid/mpesa-php-api to integrate M-Pesa API easier in Laravel applications

For more information of what's M-Pesa, please refer to M-Pesa official website: https://www.vm.co.mz/en/M-Pesa2

For more information of what abdulmueid/mpesa-php-api is, refer to https://github.com/abdulmueid/mpesa-php-api

# 1. Installation

All that you have to do is the following:
```
composer require calvin/mpesa-mz
```

```
php artisan vendor:publish --providor=calvinchiulele\MPesaMz\Providers\MPesaMzServiceProvider --tag=config
```

# 2. Configuration

After you have published the config files necessary for the package, you've to add all the keys 
necessary for the config file in your .env in order to the config file work properly.

The .env would be like that:

```
MPESA_PUBLIC_KEY=xxx
MPESA_API_HOST="api.sandbox.vm.co.mz"
MPESA_API_KEY=xxx
MPESA_ORIGIN=xxx
MPESA_SERVICE_PROVIDER_CODE=xxx
MPESA_INITIATOR_IDENTIFIER=xxx
MPESA_SECURITY_CREDENTIAL=xxx
```

And the config/mpesa-config.php would be like that:

```
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
```

# 3. Usage

In order to use the package in your Laravel application, you can use either facade or get an instance of M-Pesa on the
service container.

# Using the facade
 
```
<?php

namespace App\Http\Controllers;

use calvinchiulele\MPesaMz\Facades\MPesaMzFacade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    // more code

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $reference corresponds to your M-Pesa TransactionReference
        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        // $thirdPartyReference corresponds to your M-Pesa ThirdPartyReference
        $payment = MPesaMzFacade::payment($request->msisdn, 100, $reference, $thirdPartyReference);

        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        $refund = MPesaMzFacade::refund($payment->getTransactionID(), 100);

        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        $query = MPesaMzFacade::query($refund->getTransactionID(), 100);

        // more code
    }
}

```

# Using the instance from service container
 
```
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * M-Pesa service class
     *
     * @var calvinchiulele\MPesaMz\Services\MpesaMz
     */
     protected $mpesaService;

    /**
     * Create a new instance
     *
     * @return void
     */
     public function __construct()
     {
         $this->mpesaService = app('mpesamz');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $reference corresponds to your M-Pesa TransactionReference
        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        // $thirdPartyReference corresponds to your M-Pesa ThirdPartyReference
        $payment = $this->mpesaService->payment($request->msisdn, 100, $reference, $thirdPartyReference);

        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        $refund = $this->mpesaService->refund($payment->getTransactionID(), 100);

        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        $query = $this->mpesaService->query($refund->getTransactionID(), 100);

        // more code
    }
}

```

This package is still in development so any suggestions, improvements and recommendations are welcomed.
