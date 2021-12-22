<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 15:10
 */


namespace App\jsonRpc\Annotation;


interface CategoryServiceInterface
{
    /**
     * 获取分类列表
     * @param string $order 排序方式
     * @return array 分类数组
     */
    public function list(string $order = 'dateline desc') : array;

    /**
     * 获取分类详情
     * @param int $categoryId
     * @return array
     */
    public function detail(int $categoryId) : array;
}