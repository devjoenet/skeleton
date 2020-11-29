<?php

namespace :uc:vendor\:uc:package;

use Illuminate\Support\ServiceProvider;

class :uc:packageServiceProvider extends ServiceProvider
{
	protected static string $routes = __DIR__ . '/routes.php';
	protected static string $lang = __DIR__ . '/../resources/lang';
	protected static string $views = __DIR__ . '/../resources/views';
	protected static string $assets = __DIR__ . '/../resources/assets';
	protected static string $config = __DIR__ . '/../config/:lc:package.php';
	protected static string $migrations = __DIR__ . '/../database/migrations';


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(self::$lang, ':lc:package');
        // $this->loadViewsFrom(self::$views, ':lc:package');
        // $this->loadMigrationsFrom(self::$migrations);
        // $this->loadRoutesFrom(self::$routes);

        // Provide publishing options and commands for Artisan.
        $this->app->runningInConsole() && $this->bootForConsole();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(self::$config, ':lc:package');

        // Register the service the package provides.
        $this->app->singleton(':lc:package', function ($app) {
            return new :uc:package;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [':lc:package'];
    }

    /**
     * Provide publishing options, and Artisan commands.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publish config
        $this->publishes([self::$config => config_path(':lc:package.php')], ':lc:package.config');

        // Publish views
        //$this->publishes([self::$views => resource_path('views/vendor/:lc:vendor')], ':lc:package.views');

        // Publish assets
        //$this->publishes([self::$assets => public_path('vendor/:lc:vendor')], ':lc:package.assets');

        // Publish translation files
        //$this->publishes([self::$lang => resource_path('lang/vendor/:lc:vendor')], ':lc:package.lang');

        // Register package commands
        // $this->commands([]);
    }
}
