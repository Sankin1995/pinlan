<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>时时贝管理系统登录界面</title>
    <link rel="stylesheet" href="/Public/Admin/css/login/login.css">
</head>
<body>
<div class="bg_background"><img class="bg_background_img" src="/Public/Admin/img/login/beijing.png"></div>
<div class="container">
    <h1><span>聘蓝</span>&nbsp;&nbsp;<span>后台管理系统</span></h1>
    <div class="login_form">
        <form action="" id="form" method="post">
 	  	<h1>管理登录</h1>
            <label>用户: <input type="text" name="username" id="username"></label><br>
            <label>密码: <input type="password" name="password" id="password"></label><br>
            <input type="submit" value="登录" id="btn" style="width: 230px;margin-top: 20px;margin-left: 118px;background-color: #f4a049;color: white;height: 30px;line-height: 30px;font-size: 20px;border:none;font-weight: bold;border-radius: 5px;">
        <!--<button id="btn">登录</button>-->
        </form>
    </div>
</div>
</body>
<script>
    function verticalCenter() {
        var container = document.getElementsByClassName("container");
        var bg_background_img = document.getElementsByClassName("bg_background_img");
        var container_height = container[0].offsetHeight;
        var bg_background_img_height = bg_background_img[0].offsetHeight;
        var margin_top = (bg_background_img_height - container_height)/2;
        container[0].style.marginTop = margin_top + "px";
    }
    /*竖直居中*/
    verticalCenter();
    /*屏幕变化事件*/
    window.onresize = function(){
        /*竖直居中*/
        verticalCenter();
    }
</script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script >
$(function () {
        $("#btn").click(function () {
//            alert(11);
//            console.log(1);
            //获取form提交数据
            var username = $("#username").val();
            var password = $("#password").val();
//            //验证用户名密码
            if(username==""||password==""){
                alert("用户名或密码不能为空");
                window.location.href="<?php echo U('Admin/Login/index');?>";
            }else{
                $.post("<?php echo U('Admin/Login/login');?>",{username:username,password:password},function (data) {
                    if(data){
                        window.location.href="<?php echo U('Admin/Index/index');?>";
                    }else{
                        alert("用户名或密码错误");
                    }
                },"json");
            }
//
        });
});
</script>
</html>