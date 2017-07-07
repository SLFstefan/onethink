<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/6
 * Time: 22:42
 */

namespace Admin\Controller;


use Think\Page;

class SaleController extends AdminController
{
    public function index(){
        $list_page = M('Sale');
        import('ORG.Util.Page');// 导入分页类
        $count = $list_page->count();// 查询满足要求的总记录数
        $page = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
        $page->setConfig('header','条信息');
        $show = $page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $list  = $list_page->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->meta_title = '小区租售';
        $this->display();

    }
    //添加
    public function add(){
        if(IS_POST){
            $Sale = D('Sale');
            $data = $Sale->create();
            if($data){
                $id = $Sale->add();
                if($id){
                    $this->success('新增成功', U('index'));
                }else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Sale->getError());
            }
        } else {
            $this->assign('info',null);
            $this->meta_title = '新增租售';
            $this->display('edit');
        }
    }

    //编辑
    public function edit($id = 0){
        if(IS_POST){
            $Sale = D('Sale');
            $data = $Sale->create();
            if($data){
                if($Sale->save()){
                    $this->success('编辑成功', U('index'));
                } else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Sale->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Sale')->find($id);
            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $this->assign('info', $info);
            $this->meta_title = '编辑租售';
            $this->display();
        }
    }

    //删除
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Sale')->where($map)->delete()){
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}