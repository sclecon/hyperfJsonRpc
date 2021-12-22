<?php

declare(strict_types=1);

return [
    'consumers' =>  [
        // jsonrpc-http 直接通过node直链
        [
            'name'  =>  'DemoService',
            'service'   =>  \App\jsonRpc\Annotation\DemoServiceInterface::class,
            'nodes' =>  [
                ['host'=>'service-demo', 'port'=>9503]
            ],
        ],
        // jsonrpc-http 通过consul中台进行请求
        [
            'name'  =>  'UserService',
            'service'   =>  \App\jsonRpc\Annotation\UserServiceInterface::class,
            'registry' => [
                'protocol' => 'consul',
                'address' => 'http://consul:8500',
            ],
        ],
        // jsonrpc 直接通过node直链
        [
            'name'  =>  'CategoryService',
            'service'   =>  \App\jsonRpc\Annotation\CategoryServiceInterface::class,
            'protocol'  =>  'jsonrpc', // 默认为jsonrpc-http 所需必须进行指定
            'nodes' =>  [
                ['host'=>'service-demo', 'port'=>9504]
            ],
        ],
        // jsonrpc 通过consul中台进行请求
        [
            'name'  =>  'ArticleService',
            'service'   =>  \App\jsonRpc\Annotation\ArticleServiceInterface::class,
            'protocol'  =>  'jsonrpc', // 默认为jsonrpc-http 所需必须进行指定
            'registry' => [
                'protocol' => 'consul',
                'address' => 'http://consul:8500',
            ],
        ],
    ]
];