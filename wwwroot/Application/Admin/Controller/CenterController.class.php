<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/6
 * Time: 22:35
 */

namespace Admin\Controller;


class CenterController extends AdminController
{
    public function index(){
        $list = M('Center')->order('id asc')->select();
        $this->assign('list', $list);
        $this->meta_title = '保修管理';
        $this->display();
    }
}