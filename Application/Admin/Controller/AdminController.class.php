<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 14:07
 */

namespace Admin\Controller;


use Think\Controller;

class AdminController extends Controller
{
    /**
     *    管理员用户管理
     */
    public function index()
    {
        $admin = M('admin'); // 实例化User对象
        $count = $admin->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $admin->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('index'); // 输出模板
    }
    /**
     *   管理员用户添加
     */
    public function add()
    {
        $data = I("post.");
        $data['password'] = md5($data['password']);
//        var_dump($data);
        $admin = M('admin');
        if($admin->add($data)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
    /**
     *   管理员用户删除
     */
    public function delete()
    {
        $id = I("post.id");
        $admin = M('admin');
        if($admin->delete($id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }

    }
    /**
     *      管理员信息修改
     */
    public function edit()
    {
        $all = I("post.");
        $id = $all['admin_id'];
        $data['username'] = $all['username'];
        $data['password'] = md5($all['password']);
        $admin = M('admin');
        if($admin->where("id=$id")->save($data)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
}