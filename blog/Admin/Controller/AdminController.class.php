<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class AdminController extends CommonController{

    public function __construct()
    {
        parent::__construct();
        if (!$this->checkAdmin()){
            $this->error('权限不够', '/admin.php');
        }
    }

    public function checkAdmin(){
        return (getAdminUser()!='admin')?false :true;
    }

    public function index(){
        try{
            $adminUsers=D('Admin')->getAdminUsers();
            if ($adminUsers===false){
                $this->error('获取用户失败');
            }
            $this->assign('adminUsers', $adminUsers);
        }catch (Exception $err){
            $this->error('异常'.$err->getMessage());
        }
        $this->display();
    }

    public function edit(){
        if ($_GET){
            $admin_id=intval($_GET['id']);
            if($admin_id && is_numeric($admin_id)){
                try{
                    $admin=D('Admin')->getAdminById($admin_id);
                    if ($admin===false){
                        return show(0,'获取个人信息失败');
                    }
                    $this->assign('adminUser', $admin);
                    $this->display();
                }catch (Exception $err){
                    return show(0, '异常'.$err->getMessage());
                }
            }
        }else{
            $this->error('id出错');
        }
    }

    public function add(){
        if ($_POST){
//            print_r($_POST);exit;
            if(!isset($_POST['username']) || !trim($_POST['username'])){
                return show(0,'用户名为空');
            }
            if(!isset($_POST['password']) || !trim($_POST['password'])){
                return show(0,'密码为空');
            }
            if(!isset($_POST['realname']) || !trim($_POST['realname'])){
                return show(0,'真实姓名为空');
            }
            if(!isset($_POST['email']) || !trim($_POST['email'])){
                return show(0,'email为空');
            }
            if(isset($_POST['admin_id']) && $_POST['admin_id']){
                if (isset($_POST['password2']) && trim($_POST['password2'])){
                    ($_POST['password']==md5($_POST['password2']))? $_POST['password']: $_POST['password']=md5($_POST['password2'].C('MD5_PRE'));
                }
                $this->save();
            }
            try{
                $admin=D('Admin')->insert($_POST);
                if ($admin===false){
                    return show(0,'添加用户失败');
                }
                return show(1,'添加成功');
            }catch (Exception $err){
                return show(0,'异常'.$err->getMessage());
            }
        }
        $this->display();
    }

    public function save(){
        if ($_POST){
            $admin_id=intval($_POST['admin_id']);
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

    public function del(){
        $this->setStatus();
    }

    public function setStatus(){
        if ($_POST){
            $adminId=$_POST['id'];
            $status=intval($_POST['status']);
            switch ($status){
                case '-1':
                    try{
                        $admin_Id=D('Admin')->updateStatusById($adminId, $status);
                        if ($admin_Id===false){
                            return show(0, '删除失败');
                        }
                    }catch(Exception $err){
                        return show(0, '异常'.$err->getMessage());
                    }
                    return show(1,'删除成功');
                case '0':
                    try{
                        $admin_Id=D('Admin')->updateStatusById($adminId, $status);
                        if ($admin_Id===false){
                            return show(0, '关闭失败');
                        }
                    }catch(Exception $err){
                        return show(0, '异常'.$err->getMessage());
                    }
                    return show(1,'关闭成功');
                case '1';
                    try{
                        $admin_Id=D('Admin')->updateStatusById($adminId, $status);
                        if ($admin_Id===false){
                            return show(0, '开启失败');
                        }
                    }catch(Exception $err){
                        return show(0, '异常'.$err->getMessage());
                    }
                    return show(1,'开启成功');
                default:
                    return show(0, '状态参数有误');
            }
        }
    }
}