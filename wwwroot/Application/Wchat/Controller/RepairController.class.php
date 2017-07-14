<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/10
 * Time: 11:31
 */

namespace Wchat\Controller;


class RepairController extends WchatController
{
    //在线报修首页
    public function repair(){
        $this->login();
        $this->display('repair');
    }
    //添加页面
    public function add(){
        if(IS_POST){
            $Repair = D('Repair');
            $data = $Repair->create();
            if($data){
                $id = $Repair->add();
                if($id){
                    $this->success('报修成功', U('Index/index'));
                }else {
                    $this->error('报修失败');
                }
            } else {
                $this->error($Repair->getError());
            }
        } else {
            $this->error('请用post提交数据');
        }

    }
}