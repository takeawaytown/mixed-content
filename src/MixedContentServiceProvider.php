<?php

namespace TakeawayTown\MixedContent;

use Illuminate\Support\ServiceProvider;

class MixedContentServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    if (function_exists('config_path')) {
      $this->publishes([
        realpath(__DIR__.'/../config/config.php') => config_path('mixedcontent.php'),
      ]);
    }
  }
}
