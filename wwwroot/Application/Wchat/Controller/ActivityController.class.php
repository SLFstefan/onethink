<?php
/**
 * Created by PhpStorm.
 * User: stefan
 * Date: 2017/7/9
 * Time: 14:16
 */

namespace Wchat\Controller;


class ActivityController extends WchatController
{
    public function index($p=1){
        if(IS_AJAX){
            $model = M('document');
            $pagesize = 1;
            $start=($p-1)*$pagesize;
            $list=$model->where(array('document.category_id'=>43))->join('picture ON document.cover_id = picture.id')->join('document_article ON document.id = document_article.id')->limit($start,$pagesize)->select();
            $this->ajaxReturn($list);
        }else{
            /* 获取通知列表 */
            $model = M('document');
            $pagesize = 1;
            $start=($p-1)*$pagesize;
            $list=$model->where(array('document.category_id'=>43))->join('picture ON document.cover_id = picture.id')->join('document_article ON document.id = document_article.id')->limit($start,$pagesize)->select();
            $this->assign('list', $list);
            $this->meta_title = '小区活动';
            $this->display();
        }
    }
    //详情
    public function detail($id=0){
        $Document=D('Document');
        $data=$Document->where(array('document.id'=>$id))->setInc('view',1);
        if($data){
            $Document->save();
            $detail=M('Document')->where(array('document.id'=>$id))->join('member ON document.uid=member.uid')->join('picture ON document.cover_id = picture.id')->join('document_article ON document.id = document_article.id')->find();
            $this->assign('detail',$detail);
            $this->meta_title='活动详情';
            $this->display('detail');
        }else {
            $this->error('你访问的页面不存在');
        }

    }
    //申请参加活动
    public function apply($activity_id=0,$user_id=0){
        $this->login();
        $apply=M('Apply');
        $data=$apply->where(array('uid'=>$user_id,'activity_id'=>$activity_id))->find();
        if(count($data)){
            $this->error('你已经参加过该活动了',U('Activity/index'));
        }else{
            $arr=array();
            $arr['uid']=$user_id;
            $arr['apply_time']=time();
            $arr['activity_id']=$activity_id;
            $arr['status']=1;
            $apply->add($arr);
            $this->success('申请已提交，请等待审核',U('Activity/index'));
        }
    }
}