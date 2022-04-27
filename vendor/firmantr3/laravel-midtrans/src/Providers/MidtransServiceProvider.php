<?php 

namespace Firmantr3\Midtrans\Providers;

use Firmantr3\Midtrans\Midtrans;
use Illuminate\Support\ServiceProvider;

class MidtransServiceProvider extends ServiceProvider {

    /** @return string */
    public function getConfigPath() {
        return __DIR__ . '/../../config/midtrans.php';
    }
    
    public function boot() {
        $this->publishes([
            $this->getConfigPath() => config_path('midtrans.php'),
        ], 'config');

        $this->app->singleton('midtrans', function ($app) {
            return new Midtrans;
        });

        Midtrans::registerMidtransConfig();
    }

    public function register() {
        $this->mergeConfigFrom(
            $this->getConfigPath(),
            'midtrans'
        );
    }

}
