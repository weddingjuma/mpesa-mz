<?php

namespace calvinchiulele\MPesaMz\Providers;

use calvinchiulele\MPesaMz\Services\MpesaMz;
use Illuminate\Support\ServiceProvider;

/**
 *
 * @package calvinchiulele\MPesaMz\Providers
 * @author Calvin Chiulele <cchiulele@protonmail.com>
 * @since 0.1.0
 */
class MPesaMzServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('mpesamz', function () {
            return new MpesaMz();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/config/mpesa-config.php' =>
            config_path('mpesa-config.php')], 'config');
    }
}
