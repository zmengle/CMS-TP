<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class BasicController extends CommonController {
    private $_basicName='';

    public function __construct(){
        parent::__construct();
        $this->_basicName=C('BASIC_INFO');
    }

    public function index(){
        $res=D('Basic')->getInfo($this->_basicName);
        $this->assign('basicInfo', $res);
        $this->display();
    }

    public function add(){
        if ($_POST){
            if(!isset($_POST['title']) || !$_POST['title']){
                return show(0,'标题为空');
            }
            if(!isset($_POST['keywords']) || !$_POST['keywords']){
                return show(0,'关键词为空');
            }
            if(!isset($_POST['description']) || !$_POST['description']){
                return show(0,'描述为空');
            }
            try{
                $res=D('Basic')->update($this->_basicName, $_POST);
            }catch (Exception $err){
                return show(0,'异常'.$err->getMessage());
            }
            return show(1,'更新成功');
        }
    }

    public function cache(){

        $this->display();
    }
    
}