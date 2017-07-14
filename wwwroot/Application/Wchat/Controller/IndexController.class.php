<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/7
 * Time: 15:09
 */

namespace Wchat\Controller;


use Think\Controller;

class IndexController extends WchatController
{
    //系统首页
    public function index(){
        $this->display();
    }
    //我的
    public function my(){
        $this->login();
        $uid=session('user_auth')['uid'];
        $list=M('Member')->find($uid);
        $this->assign('list',$list);
        $this->display('my');


    }
}