<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/9/1
 * Time: 20:41
 */
namespace Admin\Controller;
use Think\Controller;

class CronController{

    public function dumpMysql(){
        if(APP_CRONTAB != 1) {
            die("the_file_must_exec_crontab");
        }
        $result=D('Basic')->getInfo(C('BASIC_INFO'));
        if (!$result['dumpmysql']){
            die("没有开启自动备份数据库");
        }
        ///usr/bin/mysqldump -uroot -p123456 cms-thinkphp > /tmp/cms-thinkphp.sql
        $shell="mysqldump -u".C("DB_USER")." -p".C("DB_PWD")." ".C("DB_NAME")."> /tmp/cms-".date(Ymdhis).".sql";
        exec($shell);
    }
}