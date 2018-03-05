<?php if (!defined('THINK_PATH')) exit();?>
<!-- 引入header头 -->
<!doctype html>
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
<body id="page-top">

<div id="wrapper">
    
    <!-- 引入导航部分 nav -->
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
        <!-- 主要内容 -->
        <div class="container-fluid pl20">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        您好！admin欢迎使用cms-thinkPHP平台！
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-dashborad"></i>平台信息</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-comments fa-lg"></i></div>
                                <div class="col-xs-9 text-right">
                                    <div class="badge pull-right"><?php echo ($indexInfo['0']); ?></div>
                                    <div class="pull-left">今日登陆用户数</div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="paner-body">
                            <ul class="list-group" style="margin-bottom: 0;">
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                            </ul>
                        </div>-->
                        <div class="panel-footer">
                            <a href="/admin.php?c=admin">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right fa-lg"></i></span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-tasks fa-lg"></i></div>
                                <div class="col-xs-9 text-right">
                                    <div class="badge pull-right"><?php echo ($indexInfo['1']); ?></div>
                                    <div class="pull-left">文章数量</div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="paner-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                            </ul>
                        </div>-->
                        <div class="panel-footer">
                            <a href="/admin.php?c=content">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right fa-lg"></i></span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-asterisk fa-lg"></i></div>
                                <div class="col-xs-9 text-right">
                                    <div class="badge pull-right"><?php echo ($indexInfo['2']["count"]); ?></div>
                                    <div class="pull-left">文章最大阅读数</div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="paner-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                            </ul>
                        </div>-->
                        <div class="panel-footer">
                            <a href="/admin.php?c=positioncontent">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right fa-lg"></i></span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><i class="fa fa-support fa-lg"></i></div>
                                <div class="col-xs-9 text-right">
                                    <div class="badge pull-right"><?php echo ($indexInfo['3']); ?></div>
                                    <div class="pull-left">推荐位置</div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="paner-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-caret-right fa-lg"></i>这里是列表</a></li>
                            </ul>
                        </div>-->
                        <div class="panel-footer">
                            <a href="/admin.php?c=position">
                                <span class="pull-left">查看</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right fa-lg"></i></span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- 引入尾部 footer -->
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
</a>
<script src="Public/js/admin/common.js"></script>

</body>
</html>