<?php namespace Xiaojiays\Curl;

use Illuminate\Support\ServiceProvider;

class CurlServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app['Curl'] = $this->app->share(
            function($app)
            {
                return new CurlService();
            }
        );
    }

    public function provides()
    {
        return ['Curl'];
    }
}
