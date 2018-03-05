<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class PersonalController extends CommonController {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $user=parent::getLoginUser();
        $admin_id=intval($user['admin_id']);
        if($admin_id && is_numeric($admin_id)){
            try{
                $admin=D('Admin')->getAdminById($admin_id);
                if ($admin===false){
                    return show(0,'获取个人信息失败');
                }
                $this->assign('adminUser', $admin);
                $this->display();
            }catch (Exception $err){
                $this->error('异常'.$err->getMessage(), '/admin.php');
            }
        }
    }

    public function save(){
        if ($_POST){
            $admin_id=intval($_POST['admin_id']);
            if(!isset($_POST['realname']) || !trim($_POST['realname'])){
                return show(0,'真实姓名为空');
            }
            if(!isset($_POST['email']) || !trim($_POST['email'])){
                return show(0,'email为空');
            }
            if (isset($_POST['password2']) && trim($_POST['password2'])){
                $_POST['password']=md5($_POST['password2'].C('MD5_PRE'));
            }
            unset($_POST['admin_id']);
            unset($_POST['password2']);
            try{
                $admin=D('Admin')->updateByAdminId($admin_id, $_POST);
                if ($admin===false){
                    return show(0,'修改用户信息失败');
                }
                return show(1,'修改成功');
            }catch (Exception $err){
                return show(0,'异常'.$err->getMessage());
            }
        }
    }
    
}