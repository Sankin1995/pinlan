<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/19
 * Time: 14:55
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller
{
    /**
     *  登录首页
     */
    public function index()
    {
        $username = cookie("username");
        if(isset($username) && $username!=null){
            $this->redirect("/Admin/Index/index");
        }else{
            $this->display('index');
        }

    }

    /**
     * 登录功能
     */
    public function login()
    {
        //接收post数据
    if(IS_POST){
            $username = I("post.username");
            $password = md5(I("post.password"));
            $admins['username'] = $username;
            $admins['password'] = $password;
            $admin = M("admin");
            $data = $admin->where($admins)->find();
            if($data){
                $info['last_login_time']=time();
                $info['last_login_ip']=$_SERVER['REMOTE_ADDR'];
                $admin->where($admins)->save($info);
                session('id',$data['user_id']);
                session('username',$data['username']);
                cookie('username',$admins['username'],3600);
                cookie('password',$admins['password'],3600);
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }
    }
    }
    /**
     * 退出登录
     */
    public function logout()
    {
        session(null);
        cookie('username',null);
        cookie('password',null);
        $this->redirect('/Admin/Login/index');
    }
}