<?php namespace Huijimuhe\Pump;

/**
 * laravel provider
 *
 * @license MIT
 * @package Huijimuhe\Pump
 */

use Illuminate\Support\ServiceProvider;

class EntrustServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('pump.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../config/config.php', 'pump'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->commands('Huijimuhe\Pump\Commands\GenerateModelCommand');
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
        ];
    }
}
