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
    public function handle(){

        $notifier = new \Faultline\Notifier( [
            'project' => 'faultline-php',
            'apiKey' => 'xxxxXXXXXxXxXXxxXXXXXXXxxxxXXXXXX',
            'endpoint' => 'https://xxxxxxxxx.execute-api.ap-northeast-1.amazonaws.com/v0',
            'notifications' => [
                [
                    'type'=> 'slack',
                    'endpoint'=> 'https://hooks.slack.com/services/XXXXXXXXXX/B2RAD9423/WC2uTs3MyGldZvieAtAA7gQq',
                    'channel'=> '#random',
                    'username'=> 'faultline-notify',
                    'notifyInterval'=> 5,
                    'threshold'=> 10,
                    'timezone'=> 'Asia/Tokyo'
                ],
                [
                    'type'=> 'github',
                    'userToken'=> 'XXXXXXXxxxxXXXXXXxxxxxXXXXXXXXXX',
                    'owner'=> 'k1LoW',
                    'repo'=> 'faultline',
                    'labels'=> [
                        'faultline', 'bug'
                    ],
                    'if_exist'=> 'reopen-and-comment',
                    'notifyInterval'=> 1,
                    'threshold'=> 1,
                    'timezone'=> 'Asia/Tokyo'
                ]
            ]

        ] );

        \Faultline\Instance::set( $notifier );

        // Add ErrorHandler
        $handler = new \Faultline\ErrorHandler($notifier);
        $handler->register();

        return $notifier;
    }
}