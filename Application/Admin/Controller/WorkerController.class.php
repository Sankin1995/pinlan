<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 11:48
 */

namespace Admin\Controller;


use Think\Controller;

class WorkerController extends Controller
{
    /**
     *  工友信息管理
     */
    public function index()
    {
        $workers = M('workers'); // 实例化User对象
        $count = $workers->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $workers->order('worker_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('index'); // 输出模板
    }
    /**
     *   工友信息删除
     */
    public function deleteWorker()
    {
        $worker_id = I("post.worker_id");
        $worker = M("workers");

        if($worker->delete($worker_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }

    /**
     * 工友信息添加
     */
    public function add()
    {
        $all = I("post.");
        $user = M("user");
        $userOne = $user->where("phone={$all['phone']}")->find();
        $user_id = $userOne['user_id'];
        unset($all['phone']);
        $all['user_id'] = $user_id;
        $worker = M('workers');
        if($worker->add($all)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
    /**
     *   回显一条数据
     */
    public function editDisplay()
    {
        $worker_id = I("post.worker_id");
        $worker = M("workers");
        $workerOne = $worker->where("worker_id=$worker_id")->find();
        $user = M("user");
        $userOne = $user->where("user_id={$workerOne['user_id']}")->find();
        $workerOne['phone'] = $userOne['phone'];
        $this->ajaxReturn($workerOne);
    }
    /**
     *   编辑工友信息
     */
    public function edit()
    {
        $all = I("post.");
        $user = M("user");
        $userOne = $user->where("phone={$all['phone']}")->find();
        $all['user_id']=$userOne['user_id'];
        unset($all['phone']);
        $worker = M("workers");
        if($worker->where("worker_id={$all['worker_id']}")->save($all)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
}