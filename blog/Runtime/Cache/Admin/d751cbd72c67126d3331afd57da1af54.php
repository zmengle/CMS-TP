<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <style>
        *{
            font-family: "Microsoft YaHei";
        }
    </style>
    <link rel="stylesheet" href="Public/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-lg-6 col-lg-offset-3">
        <form class="form-signin" enctype="multipart/form-data" method="post">
            <h2 class="form-signin-header">请登录</h2>
            <div class="form-group">
                <lable class="sr-only">用户名</lable>
                <input type="text" name="username" placeholder="请填写用户名" class="form-control" required autofocus>
            </div>
            <br>
            <div class="form-group">
                <lable class="sr-only">用户名</lable>
                <input type="password" name="password" placeholder="请填写密码" class="form-control" required>
            </div>
            <br>
            <button type="button" class="btn btn-lg btn-primary btn-block" onclick="login.check()">登录</button>
        
        </form>
    </div>

    <script src="Public/js/jquery-3.2.1.js"></script>
    <script src="Public/js/dialog/layer.js"></script>
    <script src="Public/js/dialog.js"></script>
    <script src="Public/js/admin/login.js"></script>
    <script>    
        // dialog.error('ssss');
        // 
    $(function(){
        // console.log($('input[name="username"]'));
    });
    </script>
</body>
</html>