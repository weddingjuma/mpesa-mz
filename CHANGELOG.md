# CHANGELOG

# 0.2.0

- Circle CI was removed due to configuration that's necessary in order to run the tests. We can't provide our or 
configuration from others to test the package in Circle CI but the package was tested in local environment and all the
tests were executed without failures.

# 0.3.0

Some modifications were made in the API of the package

# 0.3.1

src/Providers/MPesaMzServiceProvider now can publish the config file after issue the 
php artisan vendor:publish --provider=CalvinChiulele\MPesaMz\Providers\MPesaMzServiceProvider --tag=config.
