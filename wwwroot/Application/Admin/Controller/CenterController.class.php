<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/6
 * Time: 22:35
 */

namespace Admin\Controller;


use Think\Page;

class CenterController extends AdminController
{
    //保修管理
    public function index(){
        $list = M('Center')->order('id asc')->select();
        $this->assign('list', $list);
        $this->meta_title = '保修管理';
        $this->display();
    }
    //活动管理
    public function activity(){
        $activity_page = M('Apply');
        import('ORG.Util.Page');// 导入分页类
        $count = $activity_page->count();// 查询满足要求的总记录数
        $page = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
        $page->setConfig('header','条信息');
        $show = $page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $activity=$activity_page->join('member ON apply.uid=member.uid')->join('document ON apply.activity_id=document.id')->select();
        //var_dump($activity);
        $this->assign('activity',$activity);
        $this->meta_title='活动管理';
        $this->display('apply');
    }
}