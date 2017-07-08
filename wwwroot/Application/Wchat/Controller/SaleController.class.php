<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/7
 * Time: 16:31
 */

namespace Wchat\Controller;


class SaleController extends WchatController
{
    public function index(){
        /* 获取租售列表 */
        $list = M('Sale')->where('type=1')->order('id asc')->select();
        $list2 = M('Sale')->where('type=2')->order('id asc')->select();
        $this->assign('list', $list);
        $this->assign('list2', $list2);
        $this->buildHtml('list', HTML_PATH . '/list/', 'index');
        $this->buildHtml('list2', HTML_PATH . '/list2/', 'index');
        $this->meta_title = '小区租售';
        $this->display();
    }
    //租售详情
    public function detail($id=0){
        $detail=M('Sale')->find($id);
        $this->assign('detail',$detail);
        $this->meta_title='租售详情';
        $this->display('detail');
    }
}