<?php
/**
 * Created by IntelliJ IDEA.
 * User: yasui
 * Date: 2017/09/28
 * Time: 19:12
 */

namespace Faultline\Laravel;


use Illuminate\Support\ServiceProvider;

class FaultlineServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton( 'Faultline\Laravel\Notifier', function ($app){
            return new FaultlineHandler( $app );
        } );
    }
}