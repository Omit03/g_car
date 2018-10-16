<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"G:\xampp\htdocs\car\public/../app/admin\view\index\pcnews.html";i:1538964453;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>和美后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/static/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/static/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/static/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/static/css/AdminLTE.css">
    <link rel="stylesheet" href="/static/css/home.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/static/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
<!-- Content Header (Page header) -->
<section class="content-header vbox">
    <section class="scrollable">
        <!--头部提示开始-->
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li class="active"><i class="fa fa-home"></i>主页</li>
            <li class="active">PC网站</li>
            <li>新闻资讯列表</li>
        </ul>
        <!--头部提示结束-->
        <div class="panel-body">
            <div class="row m-b">
                <div class="col-sm-3">
                    <a href="pcnewsadd.html" class="btn btn-s-sm btn-primary btn-rounded"><i class="fa fa-plus"></i>新增</a>
                </div>
            </div>
            <div class="row m-b search">
                <div class="col-sm-4">
                    <select class="form-control col-sm-4" id="ses" name="banner_type">
                        <option value="" style="color: rgb(51, 51, 51);">请选择图片分类</option>
                        <option value="0">首页</option>
                        <option value="1">妇科</option>
                        <option value="2">儿科</option>
                        <option value="3">产科</option>
                        <option value="4">产后康复</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <button style="margin-left:-32px;" type="submit"  class=" select_se">提交</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light text-sm">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>封面图</th>
                        <th>分类</th>
                        <th>状态</th>
                        <th>sort</th>
                        <th>时间</th>
                        <th>设置</th>
                    </tr>
                    </thead>
                    <tbody id="cont">
                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$news): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td> <?php echo $news['id']; ?></td>
                        <td><?php echo $news['titles']; ?></td>
                        <td><img style="width:60px;height:60px;" src="__UPLOADS__/<?php echo $news['new_photo']; ?>" alt=""></td>
                        <?php if($news['new_type'] == 0): ?>
                        <td>首页</td>
                        <?php elseif($news['new_type'] == 1): ?>
                        <td>妇科</td>
                        <?php elseif($news['new_type'] == 2): ?>
                        <td>儿科</td>
                        <?php elseif($news['new_type'] == 3): ?>
                        <td>产科</td>
                        <?php elseif($news['new_type'] == 4): ?>
                        <td>产后康复</td>
                        <?php elseif($news['new_type'] == 7): ?>
                        <td>优惠活动</td>
                        <?php elseif($news['new_type'] == 11): ?>
                        <td>问题答疑</td>
                        <?php else: ?>
                        <td>其他</td>
                        <?php endif; if($news['is_show'] == 1): ?>
                        <td>上线</td>
                        <?php else: ?>
                        <td>下线</td>
                        <?php endif; ?>
                        <td><?php echo $news['sort']; ?></td>
                        <td><?php echo date('Y-m-d h:i:s',$news['addtime']); ?></td>
                        <td>
                            <a href="pcnewsedit.html?id=<?php echo $news['id']; ?>" class="btn _psts btn-primary"><i class="fa fa-pencil"></i> 编辑</a>
                            <a href="javascript:void(0)" id="<?php echo $news['id']; ?>" class="del btn  btn-danger"><i class="fa fa-times"></i> 删除</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</section>
<?php echo $list->render(); ?>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="/static/js/jquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/static/js/bootstrap.js"></script>
<script src="/static/js/bootstrap-paginator.js"></script>
<!-- AdminLTE App -->
<script src="/static/js/adminlte.js"></script>
<script src="/static/js/config.js"></script>
<script src="/static/js/template.js"></script>
<script src="/static/js/layer/layer.js"></script>
<script src="/static/js/basic.js"></script>
</body>
<script>
    /**************列表筛选************************/
    $(".select_se").click(function(){
        var se=$("#ses").val();
        if(se){
            data={"new_type":se};
            console.log(data);
            $.ajax({
                url: server.pcNewsList,
                data: data,
                type: "post",
                dataType: "json",
                success: function (result) {
                    console.log(result);
                    $("body").empty();
                    $("body").append(result);
                    $("#ses").val(se);

                },
                error: function (e) {
                    layer.msg("请求失败，请重试！");
                }
            });
        }else{
            layer.msg("请选科室分类！");
            return false;
        }
    });
    $('.del').on('click',function(){
        var _id = $(this).attr('id');
        layer.confirm('确定删除当前新闻？',{
            btn:['删除','取消']
        },function(){
            layer.closeAll();
            ajaxEve('post',server.pcNewsDel,{id:_id},function(result){
                layer.msg(result.msg);
                location.reload();
                return;
            },function(result){
                layer.msg(result.msg);
                return;
            })
        })
    })
</script>
</html>