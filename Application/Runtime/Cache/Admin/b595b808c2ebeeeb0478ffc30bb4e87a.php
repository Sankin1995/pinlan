<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>后台首页</title>

    <!-- Bootstrap -->
    <link href="/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Admin/css/pinlanhoutai.css">
    <script src="/Public/Admin/js/jquery-2.1.0.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">

    <div class="row LTT_header">
        <div class="LTT_header_left">聘蓝后台管理</div>
        <div class="LTT_header_right">
            <span class="glyphicon glyphicon-align-justify" style="color:white;margin-left: 15px;"></span>
            <div class="btn-group" style="float: right;margin-right: 80px;margin-top: 5px;">
                <button type="button" class="btn btn-primary" id="logout_btn">退出登录</button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu primary" style="background-color:#337AB7;margin-top: 0px;">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row LTT_context_box">
        <div class="LTT_context_left">
            <ul class="LTT_left_nav">
                <li class="LTT_left_li">
                    <p style="margin-bottom: 0px;" class="LTT_p_name">
                        <span class="glyphicon glyphicon-record"></span>
                        <span class="LTT_font_middle">普通用户管理</span>
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </p>
                    <ul class="LTT_samll_ul">
                        <li data-mid = "1"><a href="<?php echo U('Admin/User/index');?>" target="main">普通用户管理</a></li>
                    </ul>
                </li>
                <li class="LTT_left_li">
                    <p style="margin-bottom: 0px;" class="LTT_p_name">
                        <span class="glyphicon glyphicon-record"></span>
                        <span class="LTT_font_middle">企业/商家管理</span>
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </p>
                    <ul class="LTT_samll_ul">
                        <li data-mid = "1"><a href="<?php echo U('Admin/Business/index');?>" target="main">企业/商家信息管理</a></li>
                        <li data-mid = "2"><a href="<?php echo U('Admin/Business/comment');?>" target="main">企业评论管理</a> </li>
                        <li data-mid = "3"><a href="<?php echo U('Admin/Business/recruit');?>" target="main">企业招聘管理</a></li>
                        <li data-mid = "4"><a href="<?php echo U('Admin/Business/sign_up');?>" target="main">企业报名管理</a></li>
                    </ul>
                </li>
                <li class="LTT_left_li">
                    <p style="margin-bottom: 0px;" class="LTT_p_name">
                        <span class="glyphicon glyphicon-record"></span>
                        <span class="LTT_font_middle">工友管理</span>
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </p>
                    <ul class="LTT_samll_ul">
                        <li data-mid = "1"><a href="<?php echo U('Admin/Worker/index');?>" target="main">工友信息管理</a></li>
                    </ul>
                </li>
                <li class="LTT_left_li">
                    <p style="margin-bottom: 0px;" class="LTT_p_name">
                        <span class="glyphicon glyphicon-record"></span>
                        <span class="LTT_font_middle">生活圈管理</span>
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </p>
                    <ul class="LTT_samll_ul">
                        <li data-mid = "1"><a href="<?php echo U('Admin/Life/index');?>" target="main">生活圈审核管理</a></li>
                        <li data-mid = "2"><a href="<?php echo U('Admin/Life/comment');?>" target="main">生活圈评论管理</a> </li>
                    </ul>
                </li>
                <li class="LTT_left_li">
                    <p style="margin-bottom: 0px;" class="LTT_p_name">
                        <span class="glyphicon glyphicon-record"></span>
                        <span class="LTT_font_middle">管理员账户管理</span>
                        <span class="glyphicon glyphicon-menu-left"></span>
                    </p>
                    <ul class="LTT_samll_ul">
                        <li data-mid = "1"><a href="<?php echo U('Admin/Admin/index');?>" target="main">管理员账户管理</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <p class="LTT_context1_right1"></p>
        <iframe src="" name="main" style="width: 84%;height:100%;" frameborder="0" class="iframe"></iframe>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".LTT_left_nav li").click(function () {
            $(this).find("ul").show().parent().siblings().find("ul").hide();
        });
        var l = $(".LTT_left_li li").length;
        $(".LTT_left_li li").click(function () {
            var mid = parseInt(this.dataset.mid);
            console.log($(".LTT_context_right"));
            console.log(mid);
            $(".LTT_context_right").hide().eq(mid - 1).show();
            $(".LTT_context1_right1").hide();
        });



        /*$(".LTT_left_li li").click(function(){
            var l=$(".LTT_left_li li").length;
            alert(l);
            for(i=0;i<$(".LTT_left_li li").length;i++){
              $(".LTT_context_right")[i].show().siblings().hide();
            }
        })*/

    })
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script>
    $("#logout_btn").click(function () {
        window.location.href="<?php echo U('Admin/Login/logout');?>";
    });

</script>
</body>
</html>