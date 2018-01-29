<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 12:13
 */

namespace Admin\Controller;


use Think\Controller;

class LifeController extends Controller
{
    /**
     * 生活圈审核管理
     */
    public function index()
    {
        $life = M('life'); // 实例化User对象
        $count = $life->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $life->order('life_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('index'); // 输出模板
    }
    /**
     *   生活圈评论管理
     */
    public function comment()
    {
        $life_comment = M('life_comment'); // 实例化User对象
        $count = $life_comment->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $life_comment->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('comment'); // 输出模板
    }
    /**
     *   生活圈状态修改
     *
     */
    public function changeDisplay()
    {
        if(IS_POST){
            $life_id = I("post.life_id");
            $data['status'] = 0;
            $life = M("life");
            if( $life->where("life_id=$life_id")->save($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }

        }
    }
    public function changeHidden()
    {
        if(IS_POST){
            $life_id = I("post.life_id");
            $data['status'] = 1;
            $life = M("life");
            if( $life->where("life_id=$life_id")->save($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }

        }
    }
    /**
     *    删除生活圈
     */
    public function deleteLife()
    {
        $life_id = I('post.life_id');
        $life = M('life');
        if($life->delete($life_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }

    }
    /**
     *   评论状态修改
     */
    public function changeDis()
    {
        if(IS_POST){
            $com_id = I("post.com_id");
            $data['com_status'] = 0;
            $life = M("life_comment");
            if( $life->where("com_id=$com_id")->save($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }
    }

    public function changeHid()
    {
        if(IS_POST){
            $com_id = I("post.com_id");
            $data['com_status'] = 1;
            $life = M("life_comment");
            if($life->where("com_id=$com_id")->save($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }
    }
    /**
     *     删除生活圈评论
     */
    public function deleteComment()
    {
        $com_id = I("post.com_id");
        $life_comment = M("life_comment");
        if($life_comment->delete($com_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }

    }
}