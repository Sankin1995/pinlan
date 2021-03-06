<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>管理员账户管理</title>

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
        <h1>管理员账户管理 <small>Admin management</small></h1>
    </div>
    <!--模态-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        添加管理员
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加管理员</h4>
                </div>
                <div class="modal-body">
                    <!--form-->
                    <form action="" id="add_form" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">用户名</label>
                            <input type="text" class="form-control" name="username" placeholder="用户名">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">密码</label>
                            <input type="password" class="form-control" name="password" placeholder="密码">
                        </div>
                        <button type="submit" class="btn btn-default" id="add_btn">提交</button>
                    </form>
                    <!--form-->
                </div>
            </div>
        </div>
    </div>
    <!--模态-->
    <div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>用户名</th>
            <th>密码</th>
            <th>创建时间</th>
            <th>最后登录时间</th>
            <th>最后登录IP</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$admin): ?><tr>
            <td><?php echo ($admin["id"]); ?></td>
            <td><?php echo ($admin["username"]); ?></td>
            <td><?php echo ($admin["password"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$admin["create_time"])); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$admin["last_login_time"])); ?></td>
            <td><?php echo ($admin["last_login_ip"]); ?></td>
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
                                <form action="" id="edit_form" method="post">
                                    <input type="hidden" id="admin_id" name="admin_id" value="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">用户名</label>
                                        <input type="text" class="form-control" name="username" placeholder="用户名" value="" id="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">密码</label>
                                        <input type="password" class="form-control" name="password" placeholder="密码">
                                    </div>
                                    <button type="submit" class="btn btn-default" id="edit_btn">提交</button>
                                </form>
                                <!--edit form-->
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
                                <button type="button" class="btn btn-primary delete_enter" >确认</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--delete-->
            </td>
        </tr><?php endforeach; endif; ?>
    </table>
    </div>
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
<script type="text/javascript" src="/Public/Admin/js/jquery.cookie.js"></script>
<script>
    $(function () {
        $("#add_btn").click(function () {
            if($.cookie('username')==="admin"){
                $.post("<?php echo U('Admin/admin/add');?>",$("#add_form").serialize(),function (data) {
                    if(data){
                        alert('添加成功');
                        window.location.reload();
                    }else{
                        alert('添加失败');
                    }
                });
            }else{
                alert("您不是总管理员,不能作添加操作！");
            }
        });
        $(".edit_btn").click(function () {
            var id = $(this).parent().parent().children()[0].innerText;
        var username = $(this).parent().parent().children()[1].innerText;
            $("#username").val(username);
            $("#admin_id").val(id);
        });
        $("#edit_btn").click(function () {
            if($.cookie('username')==="admin"){
                $.post("<?php echo U('Admin/Admin/edit');?>",$("#edit_form").serialize(),function (data) {
                    if(data){
                        alert("修改成功");
                        window.location.reload();
                    }else{
                        alert("修改失败");
                    }
                });
            }else{
                alert("您不是总管理员，不能作修改操作！");
            }
        });
        $(".del_btn").click(function () {
            var id = $($(this).parent().parent().children()[0]).text();

            $(".delete_enter").click(function () {
                $.post("<?php echo U('Admin/Admin/delete');?>",{id:id},function (data) {
                    if(data){
                        alert("删除成功");
                        window.location.reload();
                    }else{
                        alert("删除失败");
                    }
                });
            });
        });
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Admin/js/bootstrap.min.js"></script>
</body>
</html>