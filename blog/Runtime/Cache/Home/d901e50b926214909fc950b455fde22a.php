<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>detail</title>
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

    <div class="container detail">
        <!-- container -->
        <div class="row">
            <div class="col-md-9">
                <div class="page-content">
                    <div class="title-info">
                        <!-- 标题、作者、时间、访问量 -->
                        <h3><?php echo ($detail["new"]["title"]); ?></h3>
                        <div class="a-d-c">
                            <span>作者：<?php echo ($detail["new"]["username"]); ?></span>
                            <span>时间：<?php echo (date('Y-m-d H:i',$detail["new"]["create_time"])); ?></span>
                            <span>访问量：(<?php echo ($detail["new"]["count"]); ?>)</span>
                        </div>
                    </div>
                    <div class="keys-description">
                        <!-- 关键词、描述 -->
                        <div class="keys"><i class="fa fa-fw fa-tags"></i>
                            <!--<span class="badge">教育</span><span class="badge">教育</span><span class="badge">教育</span>-->
                            <?php echo (getKeyTags($detail["new"]["keywords"])); ?>
                        </div>
                        <div class="description">
                            <p class=""><i class="fa fa-fw fa-bookmark"></i> <?php echo ($detail["new"]["description"]); ?></p>
                        </div>
                    </div>
                    <div class="content-info">
                        <!-- 具体内容部分 -->
                        <?php echo ($detail["newContent"]["content"]); ?>
                    </div>
                    <!-- <div class="like-info">
                        点赞和踩 暂时不做
                        <div class="like"><i class="fa fa fa-thumbs-o-up"></i>喜欢</div>
                        <div class="hate"><i class="fa fa fa-thumbs-o-down"></i>不喜欢</div>
                    </div> -->
                    <div class="prevs-next">
                        <!-- 上下篇链接 -->
                        <div class="prevs">上一篇：<?php if($detail["prevNew"] == null): ?>没有了<?php else: ?>
                            <a href="<?php echo (getNewUrl($detail["prevNew"]["news_id"])); ?>"><?php echo ($detail["prevNew"]["title"]); ?></a><?php endif; ?></div>
                        <div class="next">下一篇：<?php if($detail["nextNew"] == null): ?>没有了<?php else: ?>
                            <a href="<?php echo (getNewUrl($detail["nextNew"]["news_id"])); ?>"><?php echo ($detail["nextNew"]["title"]); ?></a><?php endif; ?></div>
                    </div>
                    <!-- <div class="comment-message">
                        留言评论区区 暂时不做
                        <div class="leave-comment"></div>
                        <div class="message-list"></div>
                    </div> -->
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