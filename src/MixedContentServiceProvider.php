<?php

namespace TakeawayTown\MixedContent;

use Illuminate\Support\ServiceProvider;

class MixedContentServiceProvider extends ServiceProvider
{
    /**
     * This provider is deferred and should be lazy loaded.
     *
     * @var boolean
     */
    protected $defer = true;

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        if (function_exists('config_path')) {
          $this->publishes([
            __DIR__.'/../config/config.php' => config_path('mixedcontent.php'),
          ], 'config');
        }
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'mixedcontent');
        if (! class_exists('CreateMixedContentTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__.'/../database/migrations/create_mixed_content_table.php.stub' => database_path("/migrations/{$timestamp}_create_mixed_content_table.php"),
            ], 'migrations');
        }
    }


    /**
     * Register IoC bindings.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'mixedcontent');
    }
}
