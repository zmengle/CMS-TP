<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>catid</title>
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

    <div class="container catid">
        <!-- container -->
        <div class="row">
            <div class="col-md-9">
                <div class="page-list">
                    <?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><div class="row content clearfix ">
                            <?php if($new['thumb']): ?><div class="hidden-xs col-sm-3">
                                    <a href="<?php echo (getNewUrl($new["news_id"])); ?>" class="thumb radius-shadow"><img src="<?php echo ($new["thumb"]); ?>" alt="<?php echo ($new["title"]); ?>"></a>
                                </div>
                                <div class="col-xs-12 col-sm-9">
                                    <dl>
                                        <dt><a href="<?php echo (getNewUrl($new["news_id"])); ?>"><?php echo ($new["title"]); ?></a></dt>
                                        <dd><?php echo ($new["description"]); ?>...</dd>
                                    </dl>
                                    <div class="remark">
                                        <span><i class="fa fa-tags"></i> <?php echo ($new["keywords"]); ?></span>
                                        <span><i class="fa fa-calendar"></i> <?php echo (date('Y-m-d H:i', $new["create_time"])); ?></span>
                                        <span><i class="fa fa-star"></i> 阅读(<?php echo ($new["count"]); ?>)</span>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col-xs-12">
                                    <dl>
                                        <dt><a href="<?php echo (getNewUrl($new["news_id"])); ?>"><?php echo ($new["title"]); ?></a></dt>
                                        <dd><?php echo ($new["description"]); ?>...</dd>
                                    </dl>
                                    <div class="remark">
                                        <span><i class="fa fa-tags"></i> <?php echo ($new["keywords"]); ?></span>
                                        <span><i class="fa fa-calendar"></i> <?php echo (date('Y-m-d H:i', $new["create_time"])); ?></span>
                                        <span><i class="fa fa-star"></i> 阅读(<?php echo ($new["count"]); ?>)</span>
                                    </div>
                                </div><?php endif; ?>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!--<div class="row content clearfix ">
                        <div class="hidden-xs col-sm-3">
                            <a href="" class="thumb"><img src="Public/images/banner1.jpg" alt=""></a>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <dl>
                                <dt><a href="">这是标题</a></dt>
                                <dd>这是内容简介当你重置浏览器大小的过程中，页面也会根据浏览器的宽度和面也会根据浏览器的宽度和面也会根据浏览器的宽度和高度重新渲染页面...</dd>
                            </dl>
                            <div class="remark">
                                <span><i class="fa fa-tags"></i> 关键词</span>
                                <span><i class="fa fa-calendar"></i> 时间</span>
                                <span><i class="fa fa-star"></i> 阅读(1万+)</span>
                            </div>
                        </div>
                    </div>
                    <div class="row content clearfix ">
                        <div class="hidden-xs col-sm-3">
                            <a href="" class="thumb"><img src="Public/images/banner1.jpg" alt=""></a>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <dl>
                                <dt><a href="">这是标题</a></dt>
                                <dd>这是内容简介当你重置浏览器大小的过程中，页面也会根据浏览器的宽度和面也会根据浏览器的宽度和面也会根据浏览器的宽度和高度重新渲染页面...</dd>
                            </dl>
                            <div class="remark">
                                <span><i class="fa fa-tags"></i> 关键词</span>
                                <span><i class="fa fa-calendar"></i> 时间</span>
                                <span><i class="fa fa-star"></i> 阅读(1万+)</span>
                            </div>
                        </div>
                    </div>
                    <div class="row content clearfix ">
                        <div class="hidden-xs col-sm-3">
                            <a href="" class="thumb"><img src="Public/images/banner1.jpg" alt=""></a>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <dl>
                                <dt><a href="">这是标题</a></dt>
                                <dd>这是内容简介当你重置浏览器大小的过程中，页面也会根据浏览器的宽度和面也会根据浏览器的宽度和面也会根据浏览器的宽度和高度重新渲染页面...</dd>
                            </dl>
                            <div class="remark">
                                <span><i class="fa fa-tags"></i> 关键词</span>
                                <span><i class="fa fa-calendar"></i> 时间</span>
                                <span><i class="fa fa-star"></i> 阅读(1万+)</span>
                            </div>
                        </div>
                    </div>-->
                    <div class="row clearfix">
                        <div class="col-xs-12 page-header text-center">
                            加载更多。。。
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 rank-right">
    <div class="ranking">
        <h3 class="text-center">文章排行<br><span style="font-size: 12px;color:#999;">TOP ARTICLES</span></h3>
        <ul class="list-group">
            <!--<li class="active">-->
                <!--<a href="#" class="rank-title">使用 @media 查询</a>-->
                <!--<p class="p-info">-->
                    <!--当你重置浏览器大小的过程中，keywords也会根据浏览器的宽度和高度重新渲染页面...-->
                <!--</p>-->
            <!--</li>-->
            <?php if(is_array($News)): $i = 0; $__LIST__ = array_slice($News,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$New): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo (getNewUrl($New["news_id"])); ?>" class="rank-title" title="<?php echo ($New["title"]); ?>"><?php echo (getLengthTitle(36, $New["title"])); ?></a>
                    <?php if($key == 0): ?><p class="p-info">
                            <?php echo (getLengthTitle(132, $New["description"])); ?>
                        </p><?php endif; ?>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div class="advertising">
        <!-- 广告 -->
        <?php if(is_array($advers)): $i = 0; $__LIST__ = array_slice($advers,0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$adver): $mod = ($i % 2 );++$i;?><a href="<?php echo ($adver["url"]); ?>" class="radius-shadow"><img src="<?php echo ($adver["thumb"]); ?>" alt="<?php echo ($adver["title"]); ?>"></a><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--<a href="" class="radius-shadow"><img src="Public/images/banner1.jpg" alt=""></a>-->
        <!--<a href="" class="radius-shadow"><img src="Public/images/banner1.jpg" alt=""></a>-->
    </div>
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
</body>
</html>