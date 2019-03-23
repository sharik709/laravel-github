<?php
namespace LaravelGithub;

use Illuminate\Support\ServiceProvider;

class LaravelGithubServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * It will setup configuration file
     * @return void
     */
    public function setupConfig():void
    {
        $configLocation = __DIR__.'/Config/laravelgithub.php';

        $this->publishes([
            $configLocation => config_path('laravelgithub.php')
        ], 'laravelgithub');
        $this->mergeConfigFrom(
            $configLocation,
            'laravelgithub'
        );
    }

    public function register()
    {

    }



}
