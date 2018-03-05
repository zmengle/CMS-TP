<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <!-- 编码设置为 UTF-8 -->
    <meta charset="UTF-8">
    <!-- 设置IE8浏览器显示模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 显示界面是否可变 -->
    <!--<meta name="viewport" content="width=device-width, inital-scale=1">-->
    <!-- 关键词 -->
    <meta name="keywords" content="">
    <!-- 描述 -->
    <meta name="description" content="">
    <!-- 作者 -->
    <meta name="author" content="">
    <title>index</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Public/css/sb-admin.css">
    <link rel="stylesheet" type="text/css" href="Public/css/checkbox.css">
    <link rel="stylesheet" type="text/css" href="Public/uploadify/uploadify.css">
    <link rel="stylesheet" type="text/css" href="Public/css/common.css">
    
    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="Public/font-awesome/css/font-awesome.min.css">
    
    <!-- jquery 3.2.1 -->
    <script src="Public/js/jquery-3.2.1.js"></script>
    <script src="Public/bootstrap/js/bootstrap.min.js"></script>
    <script src="Public/js/dialog/layer.js"></script>
    <script src="Public/js/dialog.js"></script>
</head>
<body>
<div id="wrapper">
    <?php if(is_array($list)): foreach($list as $key=>$vo): echo ($key); ?>|<?php echo ($vo["id"]); ?>:<?php echo ($vo["name"]); endforeach; endif; ?>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-b-20 fixed-top" id="mainNav" role="navigation">
    <div class="container-fluid"> 
      <!-- 导航 -->
        <div class="navbar-header">
            <a href="#" class="navbar-brand">cms-thinkphp内容管理平台</a>
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                  <a href="#" class="dropdown" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo ($user["username"]); ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="/admin.php?c=personal&a=index"><i class="fa fa-fw fa-user"></i> 个人中心</a></li>
                      <li class="divider"></li>
                      <li><a href="/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-sign-out"></i> 退出</a></li>
                  </ul>
              </li>
            </ul>
            <ul class="navbar-nav navbar-sidenav" id="side-nav">
                <li class="nav-item <?php echo (setActive($index='index')); ?>">
                    <a class="nav-link" href="/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
                </li>
                <?php if(is_array($adminMenus)): $i = 0; $__LIST__ = $adminMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a_menu): $mod = ($i % 2 );++$i;?><li class="nav-item <?php echo (setActive($a_menu["c"])); ?>">
                    <a class="nav-link" href="<?php echo (getAdminMenuUrl($a_menu)); ?>"><i class="fa fa-fw fa-list"></i> <?php echo ($a_menu["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <!--<li class="nav-item active">
                   <a class="nav-link" href="/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin.php?c=menu"><i class="fa fa-fw fa-list"></i> 菜单管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-bar-chart-o"></i> 导航菜单</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" data-target="#second-level" aria-expanded="false" aria-label="second-level"><i class="fa fa-fw fa-bar-chart-o"></i> 导航菜单</a>
                    <ul class="sidenav-second-level collapse" id="second-level">
                      <li><a href=""><i class="fa fa-lg fa-bar-chart-o"></i> 导航菜单</a></li>
                      <li><a href=""><i class="fa fa-lg fa-bar-chart-o"></i> 导航菜单</a></li>
                    </ul>
                </li>-->
            </ul>
            <ul class="navbar-nav sidenav-toggler">
              <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                  <i class="fa fa-fw fa-angle-left"></i>
                </a>
              </li>
            </ul>
        </div>
    </div>
</nav> 
    
    <script type="text/javascript" src="Public/kindeditor/kindeditor-all.js"></script>
    <div id="page-wrapper" class="content-wrapper py3">
        <div class="container-fluid pl20">
            <div class="row">
                <div class="col-lg-12 mt20">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i><a href="/admin.php?c=content">文章管理</a></li>
                        <li class="active"><i class="fa fa-edit"></i>文章添加</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="" class="form-horizontal" id="news_add">
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">标题：</label>
                            <div class="col-sm-5"><input type="text" class="form-control" name="title" id="inputname" value="" placeholder="请填写标题"></div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">短标题：</label>
                            <div class="col-sm-5"><input type="text" class="form-control" name="small_title" id="inputname" value="" placeholder="请填写短标题"></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">缩图：</label>
                            <div class="col-sm-5">
                                <input type="file" id="file_upload" multiple="true">
                                <img src="" style="display:none;" id="upload_org_code_img" width="150" height="150">
                                <input type="hidden" id="file_upload_image" name="thumb" multiple="true" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">标签颜色：</label>
                            <div class="col-sm-5">
                                <select name="title_font_color" class="form-control">
                                    <option value="">==请选择颜色==</option>
                                    <?php if(is_array($titleFontColor)): foreach($titleFontColor as $key=>$tf_color): ?><option value="<?php echo ($tf_color); ?>"><?php echo ($key); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">所属栏目：</label>
                            <div class="col-sm-5">
                                <select name="catid" class="form-control">
                                    <?php if(is_array($homeMenus)): $i = 0; $__LIST__ = $homeMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$homeMenu): $mod = ($i % 2 );++$i;?><option value="<?php echo ($homeMenu["menu_id"]); ?>"><?php echo ($homeMenu["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputname" class="col-sm-2 control-label">来源：</label>
                            <div class="col-sm-5">
                                <select name="copyfrom" class="form-control">
                                    <?php if(is_array($copyFrom)): foreach($copyFrom as $key=>$copy_from): ?><option value="<?php echo ($copy_from); ?>"><?php echo ($key); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">内容：</label>
                            <div class="col-sm-5">
                                <textarea class="input js-editor form-control" name="content" id="kindeditor" rows="20"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">描述：</label>
                            <div class="col-sm-9"><input type="text" class="form-control" name="description" id="inputPassword3" placeholder="请填写描述" ></div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">关键字：</label>
                            <div class="col-sm-5"><input type="text" class="form-control" name="keywords" id="inputPassword3" placeholder="请填写关键词" ></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-primary" type="button" id="news_add_sub">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var SCOPE={
        'save_url':'/admin.php?c=content&a=add',
        'jump_url':'/admin.php?c=content',
        'swf_url':'Public/uploadify/uploadify.swf',
        'uploader_url':'/admin.php?c=image&a=ajaxUploadImage',
        'uploaderJson_url':'/admin.php?c=image&a=kindUpload'
    };
</script>
<script>
    KindEditor.ready(function(k){
        window.editor=k.create(
            '#kindeditor',
            {
                cssPath : 'Public/kindeditor/plugins/code/prettify.css',
                uploadJson : SCOPE.uploaderJson_url,
                afterBlur : function(){this.sync();}
            }
        );
    });
</script>
<script src="Public/uploadify/jquery.uploadify.js"></script>
<script src="Public/js/admin/image.js"></script>
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
</a>
<script src="Public/js/admin/common.js"></script>

</body>
</html>