<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/10
 * Time: 10:52
 */

namespace Wchat\Controller;


use EasyWeChat\Foundation\Application;
use Think\Controller;

class WeixinController extends Controller
{
    protected $app;
    public function _initialize(){
        vendor("autoload");
        $options =C('WEIXIN_CONFIG');
        $this->app = new Application($options);
    }
}