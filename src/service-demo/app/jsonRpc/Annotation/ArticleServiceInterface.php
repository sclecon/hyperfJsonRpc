<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 16:28
 */


namespace App\jsonRpc\Annotation;


interface ArticleServiceInterface
{
    /**
     * 获取文章列表
     * @return array
     */
    public function list() : array;

    /**
     * 获取文章详情
     * @param int $aid 文章ID
     * @return array
     */
    public function detail(int $aid) : array;
}