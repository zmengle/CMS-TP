<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class LoginController extends Controller {
    public function index(){
        if (session('adminUser')) {
            $this->redirect('/admin.php?c=index');
        }
        $this->display();
    }

    // 登录
    public function check(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(!trim($username)){
            show(0, '用户名不能为空');
        }
        if(!trim($password)){
            show(0, '密码不能为空');
        }
        $ret=D('Admin')->getAdminByUsername($username);
        // print_r($result);
        if (!$ret) {
            return show(0,'用户不存在！');
        }
        if ($ret['password']!=getMd5Password($password)) {
             return show(0,'密码错误！');
//            return show(0,getMd5Password($password));
        }
        try{
            $row=D('Admin')->updateLast_ip_time($ret['admin_id']);
            if ($row==false){
                return show(0,'登录状态更新失败');
            }
        }catch (Exception $err){
            return show(0,'异常'.$err->getMessage());
        }

        session('adminUser',$ret);
        return show(1,'登陆成功！');
    }

    // 退出登录
    public function loginout(){
        session('adminUser',null);
        $this->redirect('/index.php?m=admin&c=login');
    }
}