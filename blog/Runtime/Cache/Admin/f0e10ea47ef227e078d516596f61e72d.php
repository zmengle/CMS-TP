<?php if (!defined('THINK_PATH')) exit();?><!-- 引入头 -->
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
<body>

<div id="wrapper">
    <!-- 引入导航 -->
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
                <div class="col-lg-12" style="padding-top: 20px;">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i><a href="/admin.php?c=menu"> 菜单管理</a></li>
                        <li class="active"><i class="fa fa-table"></i> 测试菜单</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="/admin.php?c=menu" method="get">
                        <div class="input-group">
                            <span class="input-group-addon">类型</span>
                            <select name="type" id="" class="form-control">
                                <option value="">请选择类型</option>
                                <option value="1" <?php if($type == 1): ?>selected="selected"<?php endif; ?>>后台菜单</option>
                                <option value="0" <?php if($type == 0): ?>selected="selected"<?php endif; ?>>前端导航</option>
                            </select>
                            <input type="hidden" name="c" value="menu" />
                            <input type="hidden" name="a" value="index" />
                            <span class="input-group-btn">
                                <button id="sub_data" type="submit" class="btn btn-primary"><i class="fa fa-lg fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <div class="btn-group mt20 mb20">
                        <button class="btn btn-primary" type="button" id="button-add" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><i class="fa fa-plus fa-lg" aria-hidden="true"></i>添加</button>
                    </div>
                </div> 
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>菜单列表</h3>
                    <div class="table-responsive">
                        <form id="menu_listOrder">
                            <table class="table table-bordered table-hover menu_list">
                                <thead>
                                    <tr>
                                        <th width="14">排序</th>
                                        <th>id</th>
                                        <th>菜单名</th>
                                        <th>模块名</th>
                                        <th>类型</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><tr>
                                        <td><input size="4" type="text" name="listorder[<?php echo ($menu["menu_id"]); ?>]" value="<?php echo ($menu["listorder"]); ?>"></td>
                                        <td><?php echo ($menu["menu_id"]); ?></td>
                                        <td><?php echo ($menu["name"]); ?></td>
                                        <td><?php echo ($menu["m"]); ?></td>
                                        <td><?php echo (getMenuType($menu["type"])); ?></td>
                                        <td><?php echo (getStatus($menu["status"])); ?></td>
                                        <td>
                                            <i class="fa fa-lg fa-edit fa-cursor" id="menu_edit" attr-id="<?php echo ($menu["menu_id"]); ?>" aria-hidden="true"></i> <i class="fa fa-lg fa-trash-o fa-cursor" id="menu_del" attr-id="<?php echo ($menu["menu_id"]); ?>" attr-a="menu" attr-message="删除" aria-hidden="true"></i>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </form>
                        <nav role="page">
                            <ul class="pagination">
                                <?php echo ($pageRes); ?>
                               <!--  <li>
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
                               </li> -->
                            </ul>
                        </nav>
                        <div class="btn-group">
                            <button class="btn btn-primary" id="menu_order" ><i class="fa fa-lg fa-sort-amount-asc"></i>更新排序</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var SCOPE={
        'add_url':'/admin.php?c=menu&a=add',
        'edit_url': '/admin.php?c=menu&a=edit',
        'del_url' : '/admin.php?c=menu&a=del',
        'jump_url' : '/admin.php?c=menu',
        'listorder_url' : '/admin.php?c=menu&a=listorder'
    };
</script>
<!-- 引入尾部 -->
<a class="scroll-to-top rounded" href="#page-top" style="display: inline;">
      <i class="fa fa-angle-up"></i>
</a>
<script src="Public/js/admin/common.js"></script>

</body>
</html>