<?php

namespace Pedramkousari\Sms;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('sms.php'),
            ], 'pedramkousari-sms-config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'sms');

        $this->app->singleton(SmsManager::class, function ($app) {
            return new SmsManager($app);
        });
    }
}
