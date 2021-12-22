<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 14:34
 */


namespace App\jsonRpc\Annotation;


interface UserServiceInterface
{
    /**
     * 获取用户信息
     * @param int $userId 用户UID
     * @return array 用户详情
     */
    public function getUserInfo(int $userId) : array ;
}