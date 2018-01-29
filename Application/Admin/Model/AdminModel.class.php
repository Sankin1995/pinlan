<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/19
 * Time: 16:05
 */
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model
{
    /**
     *  定义admin表规则
     */
    protected $_validate = array(
        array('username','require','请输入用户名'),
        array('password','require','请输入密码'),
    );
}