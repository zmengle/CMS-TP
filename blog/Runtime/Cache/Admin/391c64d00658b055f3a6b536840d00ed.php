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
        <div class="container-fluid pl20">
            
            <div class="row">
                <div class="col-lg-12 mt20">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i><a href="/admin.php?c=content">文章管理</a></li>
                        <li class="active"><i class="fa fa-table"></i>文章列表</li>
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
                    <div class="col-md-3">
                        <div class="input-group">
                            <i class="input-group-addon">栏目</i>
                            <select name="catid" id="catid" class="form-control">
                                <option value="">全部分类</option>
                                <?php if(is_array($homeMenus)): $i = 0; $__LIST__ = $homeMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$homeMenu): $mod = ($i % 2 );++$i;?><option value="<?php echo ($homeMenu["menu_id"]); ?>" <?php if($homeMenu["menu_id"] == $menu_id): ?>selected="selected"<?php endif; ?>><?php echo ($homeMenu["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="c" value="content">
                    <input type="hidden" name="a" value="index">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="form-control" name="title" value="<?php echo ($title); ?>" placeholder="文章标题">
                            <i class="input-group-btn">
                                <button class="btn btn-primary" id="search" type="submit"><i class="fa fa-lg fa-search"></i></button>
                            </i>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>文章列表</h3>
                    <div class="table-responsive">
                        <form id="new_listOrder">
                            <table class="table table-bordered table-hover new_list">
                                <thead>
                                    <tr>
                                        <th width="10"><input type="checkbox" id="checkall"/></th> <!--全选/全不选-->
                                        <th width="14">排序</th>
                                        <th>id</th>
                                        <th>标题</th>
                                        <th>栏目</th>
                                        <th>来源</th>
                                        <th>封面图</th>
                                        <th>时间</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><tr>
                                            <td><input name="pushcheck" type="checkbox" value="<?php echo ($new["news_id"]); ?>"></td>
                                            <td><input size="4" type="text" name="listorder[<?php echo ($new["news_id"]); ?>]" value="<?php echo ($new["listorder"]); ?>"></td>
                                            <td><?php echo ($new["news_id"]); ?></td>
                                            <td><?php echo ($new["title"]); ?></td>
                                            <td><?php echo (getMenu($homeMenus,$new["catid"])); ?></td>
                                            <td><?php echo (getCopyFromByAddr($new["copyfrom"])); ?></td>
                                            <td><?php echo (isHasThumb($new["thumb"])); ?></td>
                                            <td><?php echo (date('Y-m-d H:i',$new["create_time"])); ?></td>
                                            <td>
                                                <section class="pull-left" id="txt_status">
                                                    <?php echo (getStatus($new["status"])); ?>
                                                </section>
                                                <span class="pull-left" style="margin: 0 5px">|</span>
                                                <section class="pull-left">
                                                    <div class="turn">
                                                        <label for="checkbox"></label>
                                                        <input type="checkbox" id="checkbox" attr-id="<?php echo ($new["news_id"]); ?>" attr-message="状态" <?php if($new["status"] == 1): ?>checked<?php endif; ?>>
                                                        <span></span>
                                                    </div>
                                                </section>
                                            </td>
                                            <td>
                                                <i class="fa fa-lg fa-edit fa-cursor" id="new_edit" attr-id="<?php echo ($new["news_id"]); ?>"></i>
                                                <i class="fa fa-lg fa-trash-o fa-cursor" id="new_del" attr-id="<?php echo ($new["news_id"]); ?>" attr-a="news" attr-message="删除"></i>
                                                <i class="fa fa-lg fa-eye fa-cursor" id="new_view" attr-id="<?php echo ($new["news_id"]); ?>" attr-message="预览"></i>
                                            </td>

                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </form>
                        <div class="col-sm-12">
                            <nav role="page" class="pull-left">
                                <ul class="pagination">
                                    <?php echo ($pageShow); ?>
                                    <!--<li>
                                      <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                      </a>
                                    </li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                      <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                      </a>
                                    </li>-->
                                </ul>
                            </nav>
                            <div class="btn-group pull-right">
                                <button class="btn btn-primary dropdown-toggle" id="new_order"><i class="fa fa-lg fa-sort-amount-asc"></i>更新排序</button>
                            </div>
                        </div>

                        <div class="input-group col-sm-3">
                            <select class="form-control" name="position_id" id="select_push">
                                <option value="">请选择推荐位置推送</option>
                                <?php if(is_array($positions)): $i = 0; $__LIST__ = $positions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$position): $mod = ($i % 2 );++$i;?><option value="<?php echo ($position["id"]); ?>"><?php echo ($position["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                            </select>
                            <span class="input-group-btn"><button type="button" class="btn btn-primary" id="select_push_sub">推送</button></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var SCOPE={
        'add_url':'/admin.php?c=content&a=add',
        'edit_url':'/admin.php?c=content&a=edit',
        'set_status_url':'/admin.php?c=content&a=setStatus',
        'del_url':'/admin.php?c=content&a=del',
        'listorder_url':'/admin.php?c=content&a=listOrder',
        'push_url':'/admin.php?c=positioncontent&a=push',
        'jump_url':'/admin.php?c=content'
    };
</script>
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
</a>
<script src="Public/js/admin/common.js"></script>

</body>
</html>