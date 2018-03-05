<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/9/1
 * Time: 20:22
 */
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);

// 关闭安全文件
define('BUILD_DIR_SECURE', true);

//计划执行脚本任务
define('APP_CRONTAB', 1);
//print_r($argv);exit;
if(!$argv || count($argv) < 4) {
    die("parmas_is_error");
}

$dir=dirname(__FILE__);
define('HTML_PATH', $dir.'/');
$_GET['m'] = !isset($_GET['m']) ? $argv[1]:'admin';
$_GET['c'] = !isset($_GET['c']) ? $argv[2]:'index';
$_GET['a'] = !isset($_GET['a']) ? $argv[3]:'index';

// 定义应用目录
define('APP_PATH',$dir.'/blog/');

// 引入ThinkPHP入口文件
require $dir.'/ThinkPHP/ThinkPHP.php';