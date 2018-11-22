<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 18-11-22
 * Time: 下午3:05
 */

namespace monitor\php_monitor;
require_once '../vendor/autoload.php';

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Agent::class, function(){
            return new Agent(config('services.monitor.url'));
        });

        $this->app->alias(Agent::class, 'monitor');
    }

    public function provides()
    {
        return [Agent::class, 'monitor'];
    }

}