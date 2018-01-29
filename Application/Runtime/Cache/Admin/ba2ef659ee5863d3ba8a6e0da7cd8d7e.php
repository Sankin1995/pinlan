<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>企业评论管理</title>

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
        <h1>企业评论管理 <small>Review management</small></h1>
    </div>
    <!--模态-->
    <div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>评论ID</th>
            <th>企业ID</th>
            <th>用户ID</th>
            <th>评论内容</th>
            <th>评论时间</th>
            <th>认证评论</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$comment): ?><tr>
            <td><?php echo ($comment["com_id"]); ?></td>
            <td><?php echo ($comment["bus_id"]); ?></td>
            <td><?php echo ($comment["user_id"]); ?></td>
            <td><?php echo ($comment["content"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$comment["time"])); ?></td>
            <td>
                <?php if($comment["com_status"] == 1): ?><button class="btn btn-info " id="display_btn">已显示</button>
                    <?php else: ?>
                    <button class="btn btn-danger " id="hidden_btn">已隐藏</button><?php endif; ?>
            </td>
            <td >
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
        $("#display_btn").click(function () {
            var $com_id = $($("#display_btn").parent().parent().children("td").get(0)).text();
            $.post("<?php echo U('Admin/business/changeDisplay');?>",{com_id:$com_id},function (data) {
                if(data){
                    alert("该评论已隐藏");
                    window.location.reload();
                }
            });
        });

        $("#hidden_btn").click(function () {
            var $com_id = $($("#hidden_btn").parent().parent().children("td").get(0)).text();
            $.post("<?php echo U('Admin/Business/changeHidden');?>", {com_id:$com_id}, function (data) {
                if (data) {
                    alert("该评论已显示");
                    window.location.reload();
                }
            });
        });
        
        

$(".del_btn").click(function () {
    var com_id = $($(this).parent().parent().children()[0]).text();

    $(".delete_enter").click(function () {
        $.post("<?php echo U('Admin/business/deleteComment');?>",{com_id:com_id},function (data) {
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