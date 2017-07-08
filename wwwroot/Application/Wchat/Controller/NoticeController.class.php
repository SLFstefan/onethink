<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/7
 * Time: 16:23
 */

namespace Wchat\Controller;


class NoticeController extends WchatController
{
    public function index(){
        /* 获取通知列表 */
        $model = M('document');
        $list=$model->join('picture ON document.cover_id = picture.id')->join('document_article ON document.id = document_article.id')->select();
        $this->assign('list', $list);
        $this->meta_title = '小区通知';
        $this->display();
    }
    //详情
    public function detail($id=0){
        $detail=M('Document')->where(array('document.id'=>$id))->join('document_article ON document.id = document_article.id')->join('picture ON document.cover_id = picture.id')->find();
        $this->assign('detail',$detail);
        $this->meta_title='通知详情';
        $this->display('detail');
    }
}