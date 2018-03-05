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
                        <li class="active"><i class="fa fa-table"></i> 推荐位内容管理</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb20">
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="button-add" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><i class="fa fa-plus fa-lg" aria-hidden="true"></i>添加</button>
                    </div>
                </div> 
            </div>
            <div class="row">
                <form action="/admin.php" method="get">
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon">推荐位</span>
                            <select class="form-control" name="position_id" id="position_id">
                                <option value="">===请选择推荐位置===</option>
                                <?php if(is_array($positions)): $i = 0; $__LIST__ = $positions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$position): $mod = ($i % 2 );++$i;?><option value="<?php echo ($position["id"]); ?>" <?php if($position['id'] == $cur_position_id): ?>selected<?php endif; ?>><?php echo ($position["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="c" value="positioncontent">
                    <input type="hidden" name="a" value="index">
                    <div class="col-md-5">
                        <div class="input-group"><input class="form-control" type="text" name="title" value="<?php echo ($cur_title); ?>" placeholder="文章标题"><i class="input-group-btn"><button class="btn btn-primary" id="" type="submit"><i class="fa fa-lg fa-search"></i></button></i></div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <h3>推荐位内容列表</h3>
                    <div class="table-responsive">
                        <form action="" id="p_c_listOrder">
                           <table class="table table-bordered table-hover p_c_list">
                                <thead>
                                    <tr>
                                        <th width="14">排序</th>
                                        <th>id</th>
                                        <th>推荐位置</th>
                                        <th>标题</th>
                                        <th>封面图</th>
                                        <th>时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                            <td><input size="4" type="text" name="listorder[<?php echo ($list["id"]); ?>]" value="<?php echo ($list["listorder"]); ?>"></td>
                                            <td><?php echo ($list["id"]); ?></td>
                                            <td><?php echo (getPositionName($positions, $list["position_id"])); ?></td>
                                            <td><?php echo ($list["title"]); ?></td>
                                            <td><?php echo (isHasThumb($list["thumb"])); ?></td>
                                            <td><?php echo (date('Y-m-d H:i', $list["create_time"])); ?></td>
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
                                                <i class="fa fa-lg fa-edit fa-cursor" id="p_c_edit" attr-id="<?php echo ($list["id"]); ?>" attr-message="编辑">
                                                </i><i class="fa fa-lg fa-trash-o fa-cursor" id="p_c_del" attr-id="<?php echo ($list["id"]); ?>" attr-message="删除"></i>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table> 
                        </form>
                        <nav role="page">
                            <?php echo ($pageShow); ?>
                        </nav>
                        <div class="btn-group">
                            <button class="btn btn-primary dropdown-toggle" id="p_c_order"><i class="fa fa-lg fa-sort-amount-asc"></i>更新排序</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var SCOPE={
        'add_url' : '/admin.php?c=positioncontent&a=add',
        'edit_url' : '/admin.php?c=positioncontent&a=edit',
        'del_url' : '/admin.php?c=positioncontent&a=del',
        'set_status_url':'/admin.php?c=positioncontent&a=setStatus',
        'listorder_url' : '/admin.php?c=positioncontent&a=listorder',
        'jump_url': '/admin.php?c=positioncontent'
    };
</script>
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
</a>
<script src="Public/js/admin/common.js"></script>

</body>
</html>