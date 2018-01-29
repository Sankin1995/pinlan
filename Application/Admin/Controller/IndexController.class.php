<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    /**
     *  后台主页
     */
    public function index(){
        $this->display('index');
    }

}