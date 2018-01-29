<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>工友信息管理</title>

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
        <h1>工友信息管理 <small>Worker management</small></h1>
    </div>
    <!--模态-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        添加工友信息
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加工友信息</h4>
                </div>
                <div class="modal-body">
                    <!--form-->
                    <form action="" method="post" id="add_form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">(用户)手机号码</label>
                            <input type="text" class="form-control" name="phone" placeholder="MobilePhone" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">姓名</label>
                            <input type="text" class="form-control" name="name" placeholder="姓名" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">性别</label>
                            <label class="radio-inline">
                                <input type="radio" name="sex"  value="男" checked> 男
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="sex"  value="女"> 女
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">身份证号</label>
                            <input type="text" class="form-control" name="id_card" placeholder="身份证号" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">年龄</label>
                            <input type="text" class="form-control" name="age" placeholder="年龄" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">所在地</label>
                            <input type="text" class="form-control" name="province" placeholder="省" >
                            <input type="text" class="form-control" name="city" placeholder="市" >
                            <input type="text" class="form-control" name="county" placeholder="区" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">详细地址</label>
                            <input type="text" class="form-control" name="address" placeholder="详细地址" >
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
            <th>工友ID</th>
            <th>用户ID</th>
            <th>姓名</th>
            <th>性别</th>
            <th>身份证号</th>
            <th>年龄</th>
            <th>所在地</th>
            <th>详细地址</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$worker): ?><tr>
            <td><?php echo ($worker["worker_id"]); ?></td>
            <td><?php echo ($worker["user_id"]); ?></td>
            <td><?php echo ($worker["name"]); ?></td>
            <td><?php echo ($worker["sex"]); ?></td>
            <td><?php echo ($worker["id_card"]); ?></td>
            <td><?php echo ($worker["age"]); ?></td>
            <td><?php echo ($worker["province"]); ?>-<?php echo ($worker["city"]); ?>-<?php echo ($worker["county"]); ?></td>
            <td><?php echo ($worker["address"]); ?></td>
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
                                <form action="" method="post" id="edit_form">
                                    <input type="hidden" name="worker_id" id="worker_id" value="">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">(用户)手机号码</label>
                                        <input type="text" class="form-control" name="phone" placeholder="MobilePhone" id="edit_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">姓名</label>
                                        <input type="text" class="form-control" name="name" placeholder="姓名" id="edit_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">性别</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex"  value="男" id="nan"> 男
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex"  value="女" id="nv"> 女
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">身份证号</label>
                                        <input type="text" class="form-control" name="id_card" placeholder="身份证号" id="edit_id_card">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">年龄</label>
                                        <input type="text" class="form-control" name="age" placeholder="年龄" id="edit_age">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">所在地</label>
                                        <input type="text" class="form-control" name="province" placeholder="省" id="edit_province">
                                        <input type="text" class="form-control" name="city" placeholder="市" id="edit_city">
                                        <input type="text" class="form-control" name="county" placeholder="区" id="edit_county">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">详细地址</label>
                                        <input type="text" class="form-control" name="address" placeholder="详细地址" id="edit_address">
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
<script>
    $(function () {
        $(".del_btn").click(function () {
            var worker_id = $($(this).parent().parent().children()[0]).text();
            $(".delete_enter").click(function () {
                $.post("<?php echo U('Admin/Worker/deleteWorker');?>",{worker_id:worker_id},function (data) {
                    if(data){
                        alert("删除成功");
                        window.location.reload();
                    }else{
                        alert("删除失败");
                    }
                });
            });
        });
        
        $("#add_btn").click(function () {
            $.post("<?php echo U('Admin/Worker/add');?>",$("#add_form").serialize(),function (data) {
            if(data){
                alert("添加成功");
                window.location.reload();
            }else{
                alert("添加失败");
            }
            });
        });
        $(".edit_btn").click(function () {
            var worker_id = $(this).parent().parent().children()[0].innerText;
            $.post("<?php echo U('Admin/Worker/editDisplay');?>",{worker_id:worker_id},function (data) {
                $("#worker_id").val(worker_id);
                $("#edit_phone").val(data.phone);
                $("#edit_name").val(data.name);
                if(data.sex === "男"){
                    $("#nan").attr('checked',true);
                }else{
                    $("#nv").attr('checked',true);
                }
                $("#edit_id_card").val(data.id_card);
                $("#edit_age").val(data.age);
                $("#edit_province").val(data.province);
                $("#edit_city").val(data.city);
                $("#edit_county").val(data.county);
                $("#edit_address").val(data.address);
            });
        });
        $("#edit_btn").click(function () {
            $.post("<?php echo U('Admin/Worker/edit');?>",$("#edit_form").serialize(),function (data) {
                if(data){
                    alert("编辑成功");
                    window.location.reload();
                }else{
                    alert("编辑失败");
                }
            });
        });
    });
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Admin/js/bootstrap.min.js"></script>
</body>
</html>