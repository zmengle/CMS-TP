<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>error</title>
    <link rel="stylesheet" type="text/css" href="Public/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="Public/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="Public/css/common.css">
<link rel="stylesheet" type="text/css" href="Public/css/main.css">
</head>
<body>
<!-- index -->
    <!-- nav -->
    <nav class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a href="/index.html" class="navbar-brand">
                zmengle
                <!-- <img src="zml-ico.png" alt=""> -->
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMenu" aria-expended="false">
                <span class="sr-only">toggle nav</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="nav navbar-nav">
                <?php if(is_array($Menus)): $i = 0; $__LIST__ = array_slice($Menus,0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Menu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (getHomeMenuUrl($Menu["menu_id"])); ?>"><?php echo ($Menu["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        更多 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(is_array($Menus)): $i = 0; $__LIST__ = array_slice($Menus,4,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$Menu): $mod = ($i % 2 );++$i;?><li><a href="<?php echo (getHomeMenuUrl($Menu["menu_id"])); ?>"><?php echo ($Menu["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class='show'>
                    <a href="" class="login">登陆</a>
                    <a href="" class="logout">注册</a>
                </li>
                <li class="dropdown hidden">
                    <a href="#" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
                        admin <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href=""><i class="fa fa-fw fa-user-circle"></i> 个人中心</a></li>
                        <li class="divider" role="separator"></li>
                        <li><a href=""><i class="fa fa-fw fa-sign-out"></i> 退出</a></li>
                    </ul>
                </li>
            </ul>
            <div class="nav navbar-nav nav-search">
                <div class="form-group clearfix">
                    <input class="navbar-input" type="text" placeholder="Search">
                    <i class="fa fa-search fa-cursor" id="doSearch"></i>
                </div>
            </div>
        </div>
    </div>
</nav>

    <div class="container not-found">
        <div class="row">
            <div class="col-xs-12">
                <div class="error-info">
                <h3>错误页面：<span><?php echo ($message); ?></span></h3>
                    将于<em class="em3" style="font-size: 24px;">3</em> 秒后跳转到首页，如果失效请使用 <a href="/">手动跳转</a>
                <p>404 <br/><span style="font-size: 48px;"><i class="fa fa-unlink"></i> NOT FOUND !</span></p>
                </div>
                
               <!--  <i class="fa fa-5x fa-tv"></i>
               <span class="fa-stack fa-lg">
                   <i class="fa fa-tv fa-stack-2x">404</i>
               </span> -->
            </div>
        </div>
    </div>
    <section class='link-con'>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <h3>友情链接</h3>
                <div class="link-list">
                    <a href="#">百度一下</a>
                    <a href="#">娱乐一下</a>
                    <a href="#">搜狗一下</a>
                    <a href="#">腾讯一下</a>
                    <a href="#">阿里一下</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <h3>联系方式</h3>
                <div class="con-list clearfix">
                    <div class="format-item"><span>微信: 123165546748</span></div>
                    <div class="format-item"><span>QQ: 41654685465</span></div>
                </div>
            </div>
        </div>
        <!-- linkway -->

        <!-- contact -->
    </div>
</section>
<footer>
    <div class="container">
        <p>河南省南阳市南阳理工学院</p>
        <p>豫ICP备16019398号</p>
    </div>
</footer>

<!-- js -->
<script src="../../../../Public/js/jquery-3.2.1.js"></script>
<script src="../../../../Public/bootstrap/js/bootstrap.js"></script>
<script>
    $(function () {
       var url='/';
       var time=3;
       var timer=setInterval(function () {
           $(".em3").html(time);
           if(time==0){
               clearInterval(timer);
               location.href=url;
           }
           time--;
       },1000);
    });
</script>
</body>
</html>