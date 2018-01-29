<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23
 * Time: 9:56
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Page;

class BusinessController extends Controller
{
/**
 *      企业/商家信息显示列表
 */
    public function index()
    {
        $business = M('business'); // 实例化User对象
        $count = $business->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $business->order('bus_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }
    /**
     *   企业评论管理
     */
    public function comment()
    {
        $business_comment = M('business_comment'); // 实例化User对象
        $count = $business_comment->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $business_comment->order('bus_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('comment'); // 输出模板
    }
    
    /**
     *    企业招聘信息管理
     */
    public function recruit()
    {
        $business_recruit = M('recruit'); // 实例化User对象
        $count = $business_recruit->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $business_recruit->order('rec_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('recruit'); // 输出模板
    }
    /**
     *    企业报名管理
     */
    public function sign_up()
    {
        $business_sign_up = M('sign_up'); // 实例化User对象
        $count = $business_sign_up->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        $list = $business_sign_up->order('sign_id desc')->limit($Page->firstRow.','.$Page->listRows)->select();// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('sign_up'); // 输出模板
    }
    /**
     * 企业/商家信息添加
     */
    public function add()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = THINK_PATH;
        $upload->savePath  =      '../Public/home/images/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();
        $FilePath = array();
        if(!$info) {// 上传错误提示错误信息
            $FilePath = array();
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                if($file['key']=="images"){
                    $FilePath['images'][] = str_replace('../Public/home/images/','',$file['savepath'].$file['savename']);
                }
                if($file['key']=="licence"){
                    $FilePath['licence'][] = str_replace('../Public/home/images','',$file['savepath'].$file['savename']);
                }
            }
//            dump($FilePath);
        }

        if(IS_POST){
            $data = I("post.");
            $user = M("user");
            $userOne = $user->where("phone={$data['phone']}")->find();
            if(!isset($userOne)){
                $this->error('该用户不存在，请先添加普通用户！');
            }
            $user_id = $userOne['user_id'];
            $data['user_id']=$user_id;
            unset($data['phone']);
            if(empty($FilePath)){
                $FilePath['images']="";
                $FilePath['licence']="";
                $data['image']=$FilePath['images'];
                $data['licence'] = $FilePath['licence'];
            }else{
                //遍历
                if(count($FilePath['images']) == 1){
                    $data['image']=$FilePath['images'][0];
                }elseif (count($FilePath['images']) == 2){
                    $data['image']=$FilePath['images'][0]."-".$FilePath['images'][1];
                }else{
                    $data['image']=$FilePath['images'][0]."-".$FilePath['images'][1]."-".$FilePath['images'][2];
                }
                $data['licence'] = $FilePath['licence'][0];
            }
            $business = M("business");
            if($business->add($data)) {
                $this->redirect('/Admin/Business/index');
            }
        }
    }
    /**
     *   企业信息删除
     */
    public function deleteBusiness()
    {
        $business_id = I("post.business_id");
        $business  = M("business");
        if($business->delete($business_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }

    }
    /**
     *   企业评论状态修改
     *
     */
    public function changeDisplay()
    {
        if(IS_POST){
            $com_id = I("post.com_id");
            $data['com_status'] = 0;
            $business_comment = M("business_comment");
            if( $business_comment->where("com_id=$com_id")->save($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }

        }
    }
    public function changeHidden()
    {
        if(IS_POST){
            $com_id = I("post.com_id");
            $data['com_status'] = 1;
            $business_comment = M("business_comment");
            if( $business_comment->where("com_id=$com_id")->save($data)){
                $this->ajaxReturn(true);
            }else{
                $this->ajaxReturn(false);
            }

        }
    }
    /**
     *  删除企业评论
     */
    public function deleteComment()
    {
        $com_id = I("post.com_id");
        $business_comment = M("business_comment");
        if($business_comment->delete($com_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
    /**
     *  删除企业报名信息
     */
    public function deleteSign()
    {
        $sign_id = I("post.sign_id");
        $business_sign_up = M("sign_up");
        if($business_sign_up->delete($sign_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
    /**
     *   回显
     */
    public function editOne()
    {
        $business_id = I("post.business_id");
        $business = M("business");
        $businessOne = $business->where("bus_id=$business_id")->find();
        $user = M('user');
        $userOne = $user->where("user_id={$businessOne['user_id']}")->find();
        $businessOne['phone']=$userOne['phone'];
        unset($businessOne['user_id']);
        $this->ajaxReturn($businessOne);
    }
    /**
     * 修改
     *
     */
    public function edit()
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = THINK_PATH;
        $upload->savePath  =      '../Public/home/images/'; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();
        $FilePath = array();
        if(!$info) {// 上传错误提示错误信息
            $FilePath = array();
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            foreach($info as $file){
                if($file['key']=="images"){
                    $FilePath['images'][] = str_replace('../Public/home/images/','',$file['savepath'].$file['savename']);
                }
                if($file['key']=="licence"){
                    $FilePath['licence'][] = str_replace('../Public/home/images/','',$file['savepath'].$file['savename']);
                }
            }
        }
        $data = I("post.");
        $bus_id = $data['bus_id'];
        $user = M("user");
        $userOne = $user->where("phone={$data['phone']}")->find();
        $userData['user_id']=$userOne['user_id'];
        $userData['phone']=$data['phone'];
        $business = M("business");
        unset($data['bus_id']);
        unset($data['phone']);
        if(empty($FilePath)){
            $FilePath['images']="";
            $FilePath['licence']="";
            $data['image']=$FilePath['images'];
            $data['licence'] = $FilePath['licence'];
        }else{
            //遍历
            if(count($FilePath['images']) == 1){
                $data['image']=$FilePath['images'][0];
            }elseif (count($FilePath['images']) == 2){
                $data['image']=$FilePath['images'][0]."-".$FilePath['images'][1];
            }else{
                $data['image']=$FilePath['images'][0]."-".$FilePath['images'][1]."-".$FilePath['images'][2];
            }
            $data['licence'] = $FilePath['licence'][0];
        }
        if($business->where("bus_id=$bus_id")->save($data) && $user->where("user_id={$userOne['user_id']}")->save($userData)){
            $this->redirect('/Admin/Business/index');
        }else{
            $this->redirect('/Admin/Business/index');
        }
    }
    
    /**
     *   招聘信息添加
     */
    public function recruitAdd()
    {
        $data = I('post.');
//        echo "<pre>";
//        var_dump($data);exit;
        $business = M('business');
        $businessOne = $business->where("name='{$data['name']}'")->find();
        if($businessOne === null){
            $this->ajaxReturn("企业不存在");
            $this->redirect('/Admin/Business/recruit');
        }
        $data['bus_id']=$businessOne['bus_id'];
        $data['job_content'] = str_replace("\n","<br/>",$data['job_content']);
        $data['require'] = str_replace("\n","<br/>",$data['require']);
        $data['job_time'] = str_replace("\n","<br/>",$data['job_time']);
        $data['attention'] = str_replace("\n","<br/>",$data['attention']);
        $str = "";
        foreach ($data['welfare'] as $wel){
            $str .= "-".$wel;
        }
        $data['welfare']= ltrim($str,"-");
        $data['rec_time']=time();
        $recruit = M('recruit');
        if($recruit->add($data)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
    /**
     *   编辑回显
     */
    public function recruitDisplay()
    {
        $rec_id = I("post.rec_id");
        $recruit = M('recruit');
        $recruitOne = $recruit->where("rec_id=$rec_id")->find();
        $business = M('business');
        $businessOne = $business->where("bus_id={$recruitOne['bus_id']}")->find();
        $recruitOne['name']=$businessOne['name'];
        $recruitOne['job_content'] = str_replace("<br/>","\n",$recruitOne['job_content']);
        $recruitOne['require'] = str_replace("<br/>","\n",$recruitOne['require']);
        $recruitOne['job_time'] = str_replace("<br/>","\n",$recruitOne['job_time']);
        $recruitOne['attention'] = str_replace("<br/>","\n",$recruitOne['attention']);
        $this->ajaxReturn($recruitOne);
    }
    /**
     *   招聘信息修改
     */
    public function recruitEdit()
    {
        $data = I("post.");
//        var_dump($data);
        $rec_id = $data['rec_id'];
        $business = M('business');
        $businessOne = $business->where("name='{$data['name']}'")->find();
        if($businessOne === null){
            $this->ajaxReturn("企业不存在");
            $this->redirect('/Admin/Business/recruit');
        }
        $data['bus_id']=$businessOne['bus_id'];
        $data['job_content'] = str_replace("\n","<br/>",$data['job_content']);
        $data['require'] = str_replace("\n","<br/>",$data['require']);
        $data['job_time'] = str_replace("\n","<br/>",$data['job_time']);
        $data['attention'] = str_replace("\n","<br/>",$data['attention']);
        $str = "";
        foreach ($data['welfare'] as $wel){
            $str .= "-".$wel;
        }
        $data['welfare']= ltrim($str,"-");
        $data['rec_time']=time();
        unset($data['rec_id']);
        $recruit = M('recruit');
        if($recruit->where("rec_id=$rec_id")->save($data)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }
    }
    /**
     *   删除招聘信息
     */
    public function deleteRecruit()
    {
        $rec_id = I("post.rec_id");
        $recruit = M("recruit");
        if($recruit->delete($rec_id)){
            $this->ajaxReturn(true);
        }else{
            $this->ajaxReturn(false);
        }

        }
}