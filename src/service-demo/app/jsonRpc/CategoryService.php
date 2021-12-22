<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 15:13
 */


namespace App\jsonRpc;


use App\jsonRpc\Annotation\CategoryServiceInterface;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="CategoryService", protocol="jsonrpc", server="jsonrpc")
 */
class CategoryService implements CategoryServiceInterface
{
    protected $resources = [
        ['id'=>1, 'name'=>'html'],
        ['id'=>2, 'name'=>'css'],
        ['id'=>3, 'name'=>'javascript'],
        ['id'=>4, 'name'=>'vue'],
        ['id'=>5, 'name'=>'react'],
        ['id'=>6, 'name'=>'python'],
        ['id'=>7, 'name'=>'php'],
        ['id'=>8, 'name'=>'mysql'],
        ['id'=>9, 'name'=>'docker'],
    ];

    public function list(string $order = 'dateline desc'): array
    {
        return [
            'list'  =>  $this->resources,
            'detail'=>  $order
        ];
    }

    public function detail(int $categoryId): array
    {
        return isset($this->resources[$categoryId]) ? $this->resources[$categoryId] : [];
    }
}