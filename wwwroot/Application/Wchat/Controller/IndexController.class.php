<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/7
 * Time: 15:09
 */

namespace Wchat\Controller;


class IndexController extends WchatController
{
    //系统首页
    public function index(){
        $this->display();
    }
}