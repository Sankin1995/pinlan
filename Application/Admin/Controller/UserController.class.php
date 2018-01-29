<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/20
 * Time: 14:38
 */

namespace Admin\Controller;


use Think\Controller;

class UserController extends Controller
{
/**
 *   普通用户管理列表
 */
    public function index()
    {
        //查询所有普通用户列表
        /*$user = M('user');
        $users = $user->order('user_id desc')->select();
        $this->assign('users',$users);
        $this->display('index');*/
        $User = M('User'); // 实例化User对象
        $count = $User->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $User->order('user_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }
    /**
     *  添加用户
     */
    public function add()
    {
        if(IS_POST){
            $data['phone'] = I("post.phone");
            $data['pwd'] = md5(I("post.password"));
            $data['type'] = I("post.type");
            $data['reg_time'] = time();
            $user = M('user');
            if($user->add($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
        }
    }

    /**
     *  编辑用户
     */
    public function edit_one()
    {
       $data['phone'] = I("post.phone");
        $data['password'] = md5(I("post.password"));
        $data['type'] = I("post.type");
       $user = M('user');
       if($user->save($data)){
           $this->ajaxReturn(true);
       }else{
           $this->ajaxReturn(false);
       }
    }
    
    /**
     *    删除用户
     */
    public function delete()
    {
        $user_id = I("post.user_id");
        $user = M("user");
        if($user->where("user_id=$user_id")->delete()){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
}
