<?php

namespace mhmudhsham\IOSNotification;

use Illuminate\Support\ServiceProvider;

class IOSNotificationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'mhmudhsham');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'mhmudhsham');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ios-notification.php', 'iosnotification');

        // Register the service the package provides.
        $this->app->singleton('iosnotification', function ($app) {
            return new IOSNotification;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['iosnotification'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/ios-notification.php' => config_path('ios-notification.php'),
        ], 'iosnotification.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/mhmudhsham'),
        ], 'iosnotification.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/mhmudhsham'),
        ], 'iosnotification.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/mhmudhsham'),
        ], 'iosnotification.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
