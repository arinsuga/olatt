<?php

namespace Arins\Providers;

use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('response', function ($app) {
            return new \Arins\Services\Response\Response();
        });

        $this->app->singleton('formater', function ($app) {
            return new \Arins\Services\Formater\Formater();
        });

        $this->app->singleton('convertdate', function ($app) {
            return new \Arins\Services\Converter\Date\Convert();
        });

        $this->app->singleton('convertnumber', function ($app) {
            return new \Arins\Services\Converter\Number\Convert();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
