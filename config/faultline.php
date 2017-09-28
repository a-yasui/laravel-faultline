<?php
/**
 * Created by IntelliJ IDEA.
 * User: yasui
 * Date: 2017/09/28
 * Time: 19:36
 */

return [
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
];