<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/23
 * Time: 14:08
 */
namespace Common\Model;
use Think\Model;

class BasicModel{

    public function __construct(){

    }

    public function getInfo($name){
        if (!$name){
            throw_exception("文件名不存在");
        }
        return F($name);
    }

    public function update($name, $value, $path){
        if (!$name){
            throw_exception("文件名不存在");
        }
        if (!$value){
            throw_exception("数据有误");
        }
        return F($name,$value);
    }

    public function del($name){
        if (!$name){
            throw_exception("文件名不存在");
        }
        return F($name,null);
    }
}