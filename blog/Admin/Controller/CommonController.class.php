<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 公共类
 */
class CommonController extends Controller {
    
   
    public function __construct(){
        parent::__construct();
        $this->_init();
        $this->_showMenus();
    }

    /**
     * [_init 初始化]
     */
    private function _init(){
        $isLogin=$this->isLogin();
        if (!$isLogin) {
            $this->redirect('/admin.php?c=login');
        }
        $this->showUser();
    }

    /**
     * [isLogin 是否登录]
     * @return boolean
     */
    public function isLogin(){
        $user=$this->getLoginUser();
        if($user && is_array($user)){
            return true;
        }
        return false;
    }

    /**
     * [getLoginUser 从session获取用户信息]
     * @return array $user
     */
    public function getLoginUser(){
        return session('adminUser');
    }

    /**
     * 显示登录用户
     */
    public function showUser(){
        $user=$this->getLoginUser();
        $this->assign('user', $user);
    }

    private function _showMenus(){
        $adminMenus=D('Menu')->getAdminMenus();
        $this->assign('adminMenus', $adminMenus);
    }
    
}