<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/10
 * Time: 9:39
 */

namespace Wchat\Controller;



class WmenuController extends WeixinController
{
    public function create(){

        $menu=$this->app->menu;
        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key"  => "V1001_TODAY_MUSIC"
            ]
        ];
        $menu->add($buttons);
    }
    public function getall(){
        $menu=$this->app->menu;
        //获取所有菜单
        $menus=$menu->all();
        dump($menus);
    }
    //个人中心
    public function User(){
        $openid = session('user_auth')['uid'];
        if($openid == null){
            //获取用户的基本信息（openid），需要通过微信网页授权
            session('redirect',$_SERVER['REQUEST_URI']);
            //发起网页授权
            $response = $this->app->oauth->scopes(['snsapi_userinfo'])
                ->redirect();
            $response->send();
        }
        var_dump($openid);
    }
    //授权回调页
    public function Callback(){
        $user = $this->app->oauth->user();
        //将openid放入session
        session('openid',$user->getId());
        return $this->redirect(U(session('redirect')));
    }
}