<?php

/**
 * Created By PhpStorm
 * User sclecon
 * Contact Email 27941662@qq.com
 * Time 2021/12/20 16:30
 */


namespace App\jsonRpc;


use App\jsonRpc\Annotation\ArticleServiceInterface;
use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="ArticleService", server="jsonrpc", protocol="jsonrpc", publishTo="consul")
 */
class ArticleService implements ArticleServiceInterface
{

    protected $articleList = [
        ['id'=>1, 'subject'=>'Docker如何下载镜像', 'body'=>'docker pull 镜像名称:镜像标签', 'author'=>'sclecon'],
        ['id'=>2, 'subject'=>'Hyperf如何启动服务', 'body'=>'php 项目根目录/bin/hyperf.php start', 'author'=>'sclecon']
    ];

    public function list(): array
    {
        return $this->articleList;
    }

    public function detail(int $aid): array
    {
        return isset($this->articleList[$aid]) ? $this->articleList[$aid] : [];
    }
}