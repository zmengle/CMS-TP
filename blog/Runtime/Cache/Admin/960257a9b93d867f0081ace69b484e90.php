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
    
    <div id="page-wrapper" class="content-wrapper py3">
        <div class="container-fluid">
            <!-- container -->
            <div class="row">
                <div class="col-lg-12 mt20">
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-table"></i> 导航</li>
                        <li><i class="fa fa-thumbs-o-up"></i> 推荐位管理</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="button-add" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><i class="fa fa-plus fa-lg" aria-hidden="true"></i>添加</button>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>推荐位列表</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover position_list">
                            <thead>
                                <tr>
                                    <!-- <th width="14">排序</th> -->
                                    <th>id</th>
                                    <th>推荐位名称</th>
                                    <th>时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <!-- <td><input size="4" type="text" name="" value=""></td> -->
                                        <td><?php echo ($list["id"]); ?></td>
                                        <td><?php echo ($list["name"]); ?></td>
                                        <td><?php echo (date("Y-m-d H:i",$list["create_time"])); ?></td>
                                        <td>
                                            <section class="pull-left" id="txt_status">
                                                <?php echo (getStatus($list["status"])); ?>
                                            </section>
                                            <span class="pull-left" style="margin: 0 5px;">|</span>
                                            <section class="pull-left">
                                                <div class="turn"><label for="checkbox">
                                                    </label><input type="checkbox" id="checkbox" attr-id="<?php echo ($list["id"]); ?>" attr-message="状态" <?php if($list["status"] == 1): ?>checked<?php endif; ?>>
                                                    <span></span>
                                                </div>
                                            </section>
                                        </td>
                                        <td>
                                            <i class="fa fa-lg fa-edit fa-cursor" id="position_edit" attr-id="<?php echo ($list["id"]); ?>" attr-message="编辑"></i>
                                            <i class="fa fa-lg fa-trash-o fa-cursor" id="position_del" attr-id="<?php echo ($list["id"]); ?>" attr-message="删除"></i>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <nav class="" role="page">
                        <?php echo ($pageShow); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var SCOPE={
        'add_url' : '/admin.php?c=position&a=add',
        'edit_url':'/admin.php?c=position&a=edit',
        'del_url':'/admin.php?c=position&a=del',
        'set_status_url':'/admin.php?c=position&a=setStatus',
        'jump_url':'/admin.php?c=position'
    };
</script>
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
</a>
<script src="Public/js/admin/common.js"></script>

</body>
</html>