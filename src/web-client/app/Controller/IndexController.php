<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\jsonRpc\Annotation\ArticleServiceInterface;
use App\jsonRpc\Annotation\CategoryServiceInterface;
use App\jsonRpc\Annotation\DemoServiceInterface;
use App\jsonRpc\Annotation\UserServiceInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class IndexController
 * @package App\Controller
 * @AutoController()
 */
class IndexController extends AbstractController
{

    /**
     * @Inject
     * @var DemoServiceInterface
     */
    protected $demo;

    /**
     * @Inject
     * @var UserServiceInterface
     */
    protected $user;

    /**
     * @Inject
     * @var CategoryServiceInterface
     */
    protected $category;

    /**
     * @Inject
     * @var ArticleServiceInterface
     */
    protected $article;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'location'=> 'web-client'
        ];
    }

    public function node(){
        $a = $this->request->input('a', 1);
        $b = $this->request->input('b', 2);
        $resource = $this->demo->add(intval($a), intval($b));
        return [
            'msg'     =>  'JsonRpc-http 直接进行node节点请求',
            'input a' =>  $a,
            'input b' =>  $b,
            'resource'=>  $resource
        ];
    }

    public function user(){
        $userId = $this->request->input('user_id', 1);
        $userInfo = $this->user->getUserInfo(intval($userId));
        return [
            'msg'     =>    'JsonRpc-http 通过consul进行服务调用',
            'userinfo'=>    $userInfo
        ];
    }

    public function cate(){
        return [
            'msg'   =>  'JsonRpc 直接进行node节点请求',
            'resource'  =>  $this->category->list()
        ];
    }

    public function detail(){
        $cid = intval($this->request->input('cid', 1));
        return [
            'msg'   =>  'JsonRpc 直接进行node节点请求',
            'detail'=>  $this->category->detail($cid)
        ];
    }

    public function article_list(){
        return [
            'msg'   =>  'JsonRpc 通过consul进行服务调用',
            'list'  =>  $this->article->list()
        ];
    }

    public function article_detail(){
        $aid = intval($this->request->input('aid', 1));
        return [
            'msg'   =>  'JsonRpc 通过consul进行服务调用',
            'detail'=>  $this->article->detail($aid)
        ];
    }
}
