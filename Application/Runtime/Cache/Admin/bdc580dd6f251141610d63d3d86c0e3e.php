<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>企业/商家管理</title>

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
        <h1>企业/商家信息管理 <small>Enterprise and business information management</small></h1>
    </div>
    <!--模态-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        添加企业/商家信息
    </button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加企业/商家信息</h4>
                </div>
                <div class="modal-body">
                    <!--form-->
                    <form action="<?php echo U('Admin/business/add');?>" id="add_form" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">用户手机号码</label>
                            <input type="text" class="form-control" name="phone" placeholder="用户手机号码" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">企业/商家名称</label>
                            <input type="text" class="form-control" name="name" placeholder="企业/商家名称" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">上传宣传LOGO(目前可上传3张)</label>
                            <input type="file" name="images[]" >
                            <input type="file" name="images[]" >
                            <input type="file" name="images[]" >
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">公司简介</label>
                            <textarea name="intr" class="form-control" rows="3" style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">联系人姓名</label>
                            <input type="text" class="form-control" name="contacts" placeholder="联系人姓名" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">联系人电话</label>
                            <input type="text" class="form-control" name="contacts_phone" placeholder="联系人电话" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">法人</label>
                            <input type="text" name="legal_person" class="form-control" name="legal_person" placeholder="法人" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">法人身份证号</label>
                            <input type="text" class="form-control" name="id_card" placeholder="法人身份证号" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">工商注册号</label>
                            <input type="text" class="form-control" name="reg_number" placeholder="工商注册号" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">营业执照</label>
                            <input type="file" name="licence[]" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">认证状态</label>
                            <label class="radio-inline">
                                <input type="radio" name="status"  value="0" checked> 待认证
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status"  value="1"> 已认证
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary" id="add_btn">提交</button>
                    </form>
                    <!--form-->
                </div>
            </div>
        </div>
    </div>
    <!--模态-->
    <div class="table-responsive">
    <table class="table table-striped" border="1">
        <tr>
            <th class="LTT_th_th">商家ID</th>
            <th class="LTT_th_th">用户ID</th>
            <th class="LTT_th_th">企业/商家名称</th>
            <th class="LTT_th_th">图片</th>
            <th class="LTT_th_th">所在地</th>
            <th class="LTT_th_th">详细地址</th>
            <th class="LTT_th_th">公司简介</th>
            <th class="LTT_th_th">联系人姓名</th>
            <th class="LTT_th_th">联系人电话</th>
            <th class="LTT_th_th">法人</th>
            <th class="LTT_th_th">法人身份证号</th>
            <th class="LTT_th_th">工商注册号</th>
            <th class="LTT_th_th">营业执照</th>
            <th class="LTT_th_th">点赞人数</th>
            <th class="LTT_th_th">认证状态</th>
            <th class="LTT_th_th">操作</th>
        </tr>
        <?php if(is_array($list)): foreach($list as $key=>$business): ?><tr>
            <td class="LTT_th_td"><?php echo ($business["bus_id"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["user_id"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["name"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["image"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["province"]); ?>-<?php echo ($business["city"]); ?>-<?php echo ($business["county"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["address"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["intr"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["contacts"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["contacts_phone"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["legal_person"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["id_card"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["reg_number"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["licence"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["laud_num"]); ?></td>
            <td class="LTT_th_td"><?php echo ($business["status"]); ?></td>
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
                                <form action="<?php echo U('Admin/business/edit');?>" id="edit_form" enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="bus_id" value="" id="bus_id">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">用户手机号码</label>
                                        <input type="text" class="form-control" name="phone" placeholder="用户手机号码" id="edit_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">企业/商家名称</label>
                                        <input type="text" class="form-control" name="name" placeholder="企业/商家名称" id="edit_name">
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-3 col-md-3">
                                                <a href="#" class="thumbnail">
                                                    <img src="..." alt="..." id="img1">
                                                </a>
                                                <a href="#" class="thumbnail">
                                                    <img src="..." alt="..." id="img2">
                                                </a>
                                                <a href="#" class="thumbnail">
                                                    <img src="..." alt="..." id="img3">
                                                </a>
                                            </div>
                                            ...
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">上传宣传LOGO(目前可上传3张)</label>
                                        <input type="file" name="images[]" >
                                        <input type="file" name="images[]" >
                                        <input type="file" name="images[]" >
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">公司简介</label>
                                        <textarea name="intr" class="form-control" rows="3" style="resize: none;" id="edit_intr"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">联系人姓名</label>
                                        <input type="text" class="form-control" name="contacts" placeholder="联系人姓名" id="edit_contacts">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">联系人电话</label>
                                        <input type="text" class="form-control" name="contacts_phone" placeholder="联系人电话" id="edit_contacts_phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">法人</label>
                                        <input type="text" name="legal_person" class="form-control" name="legal_person" placeholder="法人" id="edit_legal_person">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">法人身份证号</label>
                                        <input type="text" class="form-control" name="id_card" placeholder="法人身份证号" id="edit_id_card">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">工商注册号</label>
                                        <input type="text" class="form-control" name="reg_number" placeholder="工商注册号" id="edit_reg_number">
                                    </div>
                                    <div>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-3">
                                                <a href="#" class="thumbnail">
                                                    <img src="..." alt="..." id="img4">
                                                </a>
                                            </div>
                                            ...
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">营业执照</label>
                                        <input type="file" name="licence[]" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">认证状态</label>
                                        <label class="radio-inline">
                                            <input type="radio" id="wait" name="status"  value="0" checked> 待认证
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status"  value="1" id="ready"> 已认证
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="edit_btn">提交</button>
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
        $(".del_btn").on("click",function () {
            var business_id = $(this).parent().parent().children()[0].innerText;
            $(".delete_enter").click(function () {
                $.post("<?php echo U('Admin/business/deleteBusiness');?>",{business_id:business_id},function (data) {
                    if(data){
                        alert("删除成功");
                        window.location.reload();
                    }else{
                        alert("删除失败");
                    }
                });
            });
        });
        $(".edit_btn").click(function () {
            var business_id = $(this).parent().parent().children()[0].innerText;
            $.post("<?php echo U('Admin/Business/editOne');?>",{business_id:business_id},function (data) {
                    $("#bus_id").val(business_id);
                    $("#edit_phone").val(data.phone);
                    $("#edit_name").val(data.name);
                    var str = data.image;
                    var image =  new Array();
                    image = str.split("&");
                    var path1 = "/Public"+image[0];
                    var path2 = "/Public"+image[1];
                    var path3 = "/Public"+image[2];
                    $("#img1").attr('src',path1);
                    $("#img2").attr('src',path2);
                    $("#img3").attr('src',path3);
                    $("#edit_province").val(data.province);
                    $("#edit_city").val(data.city);
                    $("#edit_county").val(data.county);
                    $("#edit_address").val(data.address);
                    $("#edit_intr").text(data.intr);
                    $("#edit_contacts").val(data.contacts);
                    $("#edit_contacts_phone").val(data.contacts_phone);
                    $("#edit_legal_person").val(data.legal_person);
                    $("#edit_id_card").val(data.id_card);
                    $("#edit_reg_number").val(data.reg_number);
                    if(data.status === "0"){
                        $("#wait").attr('checked',true);
                        $("#ready").attr('checked',false);
                    }else{
                        $("#wait").attr('checked',false);
                        $("#ready").attr('checked',true);
                    }
                    var path4 = "/Public" + data.licence;
                    $("#img4").attr('src',path4);

            });
        });
    });

</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/Public/Admin/js/bootstrap.min.js"></script>
</body>
</html>