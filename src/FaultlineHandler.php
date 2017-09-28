<?php
/**
 * Created by IntelliJ IDEA.
 * User: yasui
 * Date: 2017/09/28
 * Time: 19:30
 */

namespace Faultline\Laravel;


use Illuminate\Contracts\Foundation\Application;

/**
 * Class FaultlineHandler
 * @package Faultline\Laravel
 */
class FaultlineHandler
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * FaultlineHandler constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @return \Faultline\Notifier
     */
    public function handle()
    {
        $notifier = new \Faultline\Notifier( config( 'faultline' ) );

        \Faultline\Instance::set( $notifier );

        // Add ErrorHandler
        $handler = new \Faultline\ErrorHandler( $notifier );
        $handler->register();

        return $notifier;
    }
}