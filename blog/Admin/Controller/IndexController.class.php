<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class IndexController extends CommonController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $date=array();
        try{
            $admins=D('Admin')->countCurDay();
            if ($admins===false){
                $this->show('获取失败');
            }
            $news=D('News')->countNews();
            if ($news===false){
                $this->show('获取失败');
            }
            $max_news=D('News')->countMaxNew();
            if ($max_news===false){
                $this->show('获取失败');
            }
            $positions=D('Position')->countPosition();
            if ($positions===false){
                $this->show('获取失败');
            }
            $this->assign(
                'indexInfo',array(
                    $admins,$news,$max_news,$positions
                )
            );
//            print_r($max_news);exit;
        }catch (Exception $err){
            $this->error('异常'.$err->getMessage());
        }
        $this->display();
    }
    
}