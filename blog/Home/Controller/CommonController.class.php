<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/27
 * Time: 15:29
 */

namespace Home\Controller;
use Think\Controller;
use Think\Exception;

class CommonController extends Controller{

    public function __construct(){
        parent::__construct();
        $this->_init();
    }

    private function _init(){
        $this->showHomeMenus();
        $this->showRight();
    }

    public function Login(){

    }

    public function logout(){

    }

    public function isLogin(){

    }

    public function showHomeMenus(){
        try{
            $Menus=D("Menu")->getHomeMenus();
            if($Menus===false){
                $this->errorShow('获取导航失败');
            }
            $this->assign('Menus', $Menus);
        }catch (Exception $err){
            $this->errorShow('异常'.$err->getMessage());
        }
    }

    public function showRight(){
        try{
            $News=D("News")->getNewsByCount();
            if($News===false){
                return show(0, '获取文章排行失败');
            }
            $advers=D("PositionContent")->getContentsByPositionId(3);
            if($advers===false){
                return show(0, '获取广告失败');
            }
        }catch (Exception $err){
            return show(0, '异常'.$err->getMessage());
        }
        $this->assign('News', $News);
        $this->assign('advers', $advers);
    }

    public function errorShow($message=''){
        $message = $message?$message:'系统发生错误';
        $this->assign('message', $message);
        $this->display('Error/index');
    }

   /* public function showLink(){

    }

    public function  showContact(){

    }

    public function showBasicInfo(){

    }*/


}
