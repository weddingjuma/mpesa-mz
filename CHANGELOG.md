# CHANGELOG

# 0.2.0-beta

- Circle CI was removed due to configuration that's necessary in order to run the tests. We can't provide our or 
configuration from others to test the package in Circle CI but the package was tested in local environment and all the
tests were executed without failures.

# 0.3.0-beta

- Some modifications were made in the API of the package

# 0.3.1-beta

- src/Providers/MPesaMzServiceProvider now can publish the config file after issue the 
php artisan vendor:publish --provider=CalvinChiulele\MPesaMz\Providers\MPesaMzServiceProvider --tag=config.

# 0.3.2-beta

Fix:

- When the user tried to get an instance from the service container of \CalvinChiulele\MPesaMz\Services\MpesaMz with
default values of config/mpesa-config, the following error was raised:

```
>>> app('CalvinChiulele\MPesaMz\Services\MpesaMz')
TypeError: Argument 1 passed to abdulmueid/mpesa/Config::__construct() must be of the type string, null given, called in /var/www/html/dev/mpesa-laravel/vendor/abdulmueid/mpesa/src/Config.php on line 105
```

Now the default values of config/mpesa-config were changed from null to empty strings ('')

# 0.3.3-beta

Fix:

- illuminate/support dependency was updated in composer.json to support versions from 5.5.x, 5.6.x, 5.7.x, 5.8.x 
to 6.x

# 0.4.0-beta

Improvements:
- license was added
- README.md was updated
- renamed: config/config_test.php -> tests/config/mpesa-config-test.php
- renamed: src/Facades/MPesaMzFacade.php -> src/Facades/MPesaMz.php
- renamed: src/Services/MpesaMz.php -> src/Services/MPesaMz.php
- renamed: tests/Services/MpesaMzTest.php -> tests/Services/MPesaMzTest.php
- src/Services/MPesaMz.php can receive the path of where the config file is located on its constructor
- namespace of tests/Services/MPesaMzTest.php was changed and the composer.json was changed too to reflect it
