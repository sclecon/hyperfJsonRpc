<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 13:23
 */


namespace App\jsonRpc;


use App\jsonRpc\Annotation\DemoServiceInterface;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="DemoService", protocol="jsonrpc-http", server="jsonrpc-http")
 */
class DemoService implements DemoServiceInterface
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}