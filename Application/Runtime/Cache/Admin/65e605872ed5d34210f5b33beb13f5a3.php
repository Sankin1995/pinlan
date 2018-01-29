<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>用户管理</title>

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

<div class="LTT_context_right">
    <div class="page-header">
        <h1>普通用户管理 <small>User management</small></h1>
    </div>
    <!--模态-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        添加新用户
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加用户</h4>
                </div>
                <div class="modal-body">
                    <!--form-->
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">手机号码</label>
                            <input type="text" class="form-control"  placeholder="MobilePhone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">密码</label>
                            <input type="password" class="form-control"  placeholder="Password" id="password">
                        </div>
                        <div class="form-group">
                            <label>用户类型</label><br>
                            <input type="radio" name="user_type" value="0">普通
                            <input type="radio" name="user_type" value="1">企业
                            <input type="radio" name="user_type" value="2">商家
                            <input type="radio" name="user_type" value="3">工友
                        </div>
                        <!--<button type="submit" class="btn btn-default">Submit</button>-->
                    </form>
                    <!--form-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" id="enter">提交</button>
                </div>
            </div>
        </div>
    </div>
    <!--模态-->
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>手机号码</th>
            <th>密码</th>
            <th>状态</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$user): ?><tr name="<?php echo ($user["user_id"]); ?>">
            <td><?php echo ($user["user_id"]); ?></td>
            <td><?php echo ($user["phone"]); ?></td>
            <td><?php echo ($user["pwd"]); ?></td>
            <td>
                <?php if($user["type"] == 0): ?>普通用户
                    <?php elseif($user["type"] == 1): ?>
                        企业用户
                    <?php elseif($user["type"] == 2): ?>
                        商家用户
                    <?php elseif($user["type"] == 3): ?>
                        工友<?php endif; ?>
            </td>
            <td><?php echo (date("Y-m-d H:i:s",$user["reg_time"])); ?></td>
            <td>
                <!--edit-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary edit_btn" data-toggle="modal" data-target="#myModal_edit">编辑</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel_edit">编辑用户</h4>
                            </div>
                            <div class="modal-body">
                                <!--edit form-->
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">手机号码</label>
                                        <input type="text" class="form-control" id="edit_phone" placeholder="MobilePhone" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">密码(新密码)</label>
                                        <input type="password" class="form-control" id="edit_password" placeholder="Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>用户类型</label><br>
                                        <input type="radio" name="user_edit_type" value="0">普通
                                        <input type="radio" name="user_edit_type" value="1">企业
                                        <input type="radio" name="user_edit_type" value="2">商家
                                        <input type="radio" name="user_edit_type" value="3">工友
                                    </div>
                                </form>
                                <!--edit form-->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                <button type="button" class="btn btn-primary" id="enter_edit">提交</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--edit-->

                <!--delete-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger del_btn" data-toggle="modal" data-target="#myModal_delete" >
                    删除
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">提示</h4>
                            </div>
                            <div class="modal-body">
                                您确认要删除这条数据吗？
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="button" class="btn btn-primary enter" >确认</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--delete-->
            </td>
        </tr><?php endforeach; endif; ?>
    </table>
</div>
<div><?php echo ($page); ?></div>
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
<script>
    $("#enter").click(function () {
        $(function () {
            var phone = $("#phone").val();
            var password = $("#password").val();
            var type = $('input:radio[name="user_type"]:checked').val();
            $.post("<?php echo U('Admin/User/add');?>",{phone:phone,password:password,type:type},function (data) {
                if(data){
                    alert('添加成功');
                    window.location.href="<?php echo U('Admin/User/index');?>";
                }else{
                    alert('添加失败');
                }
            });
        });
    });
    $(".edit_btn").on("click",function () {
        var phone = $(this).parent().parent().children()[1].innerText;
        $("#edit_phone").val(phone);
        var txt = $(this).parent().parent().children()[3].innerText;
        if(txt === "普通用户"){
            $('input:radio[name="user_edit_type"][value="0"]').attr("checked","true");
        }else if(txt === "企业用户"){
            $('input:radio[name="user_edit_type"][value="1"]').attr("checked","true");
        }else if(txt === "商家用户"){
            $('input:radio[name="user_edit_type"][value="2"]').attr("checked","true");
        }else if(txt === "工友"){
            $('input:radio[name="user_edit_type"][value="3"]').attr("checked","true");
        }
//        $.get("<?php echo U('Admin/User/edit');?>",{user_id:user_id},function (data) {
//            console.log(data);
//        });
    });
    $("#enter_edit").click(function () {
        var phone = $("#edit_btn").parent().parent().children().get(1);
        $("edit_phone").val(phone);
        var edit_phone = $("#edit_phone").val();
        var edit_password = $("#edit_password").val();
        var type = $('input:radio[name="user_edit_type"]:checked').val();
        $.post("<?php echo U('Admin/User/edit');?>",{phone:edit_phone,password:edit_password,type:type},function (data) {
            if(data){
                alert('编辑成功');
                window.location.href="<?php echo U('Admin/User/index');?>";
            }else{
                alert('编辑失败');
            }
        });
    });

    $(".del_btn").on("click",function () {
        var user_id = $(this).parent().parent().children()[0].innerText;
        $(".enter").click(function () {
            $.post("<?php echo U('Admin/User/delete');?>",{user_id:user_id},function (data) {
            if(data){
                alert('删除成功');
                window.location.href="<?php echo U('Admin/User/index');?>";
            }else{
                alert('删除失败');
            }
        });
        });

    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Admin/js/bootstrap.min.js"></script>
</body>
</html>