<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 13:22
 */


namespace App\jsonRpc\Annotation;


interface DemoServiceInterface
{
    /**
     * 获取两个整数相加之合
     * @param int $a 参数1
     * @param int $b 参数2
     * @return int 相加之合
     */
    public function add(int $a, int $b) : int ;
}