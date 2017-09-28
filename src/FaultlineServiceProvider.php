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
        $this->publishes( [
            __DIR__ . '/../config/faultline.php' => config_path( 'faultline.php' ),
        ] );

    }

    public function register()
    {
        $this->app->singleton( 'Faultline\Notifier', function ($app){
            $handler = new FaultlineHandler( $app );
            return $handler->handle();
        } );
    }
}