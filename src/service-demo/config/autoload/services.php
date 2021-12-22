<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 14:43
 */
 
return [
    'enable' => [
        // 开启服务发现
        'discovery' => true,
        // 开启服务注册
        'register' => true,
    ],
    // 服务驱动相关配置
    'drivers' => [
        'consul' => [
            'uri' => 'http://consul:8500',
            'token' => ''
        ]
    ]
];