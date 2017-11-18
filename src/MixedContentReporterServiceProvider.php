<?php
/**
 * Laravel 5 Mixed Content Reporter
 *
 * @author   Alex Scott <alex.scott@takeawaytown.co.uk>
 * @license  http://opensource.org/licenses/MIT
 * @package  takeawaytown/mixed-content-reporter
 */

namespace TakeawayTown\MixedContent\Providers;

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
     * Register IoC bindings.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'mixedcontent');
    }

    /**
     * Boot the package.
     */
    public function boot()
    {
        $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('mixedcontent.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'mixedcontent');
    }
}
