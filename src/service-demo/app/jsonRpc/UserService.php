<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 14:36
 */


namespace App\jsonRpc;


use App\jsonRpc\Annotation\UserServiceInterface;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="UserService", protocol="jsonrpc-http", server="jsonrpc-http", publishTo="consul")
 */
class UserService implements UserServiceInterface
{
    public function getUserInfo(int $userId): array
    {
        $resource = [
            1   =>  [
                'username'  =>  '张三',
                'age'       =>  18
            ],
            2   =>  [
                'username'  =>  '李四',
                'age'       =>  21
            ],
            3   =>  [
                'username'  =>  '王五',
                'age'       =>  16
            ]
        ];
        return isset($resource[$userId]) ? $resource[$userId] : [];
    }
}