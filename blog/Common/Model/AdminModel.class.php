<?php 
namespace Common\Model;
use Think\Model;

class AdminModel extends Model{

    private $_db='';
    public function __construct(){
        $this->_db=M('admin');
    }

    public function countCurDay(){
        $s_time=mktime(0,0,0, date("m"), date("d"), date("Y"));
        $data=array(
                    'lastlogintime'=>array('gt', $s_time),
                    'status'=>array('eq', 1)
                );
        return $this->_db->where($data)->count('admin_id');
    }

    public function getAdminByUsername($username){
        $result=$this->_db->where('username="'.$username.'" AND status=1')->find();
        return $result;
    }

    public function updateLast_ip_time($admin_id){
        if (!$admin_id || !is_numeric($admin_id)){
            throw_exception('ID不合法');
        }
        $data['lastlogintime']=time();
        $data['lastloginip']=get_client_ip();
        return $this->_db->where('admin_id='.$admin_id)->save($data);
    }

    public function getAdminById($admin_id){
        if (!$admin_id || !is_numeric($admin_id)){
            throw_exception('ID不合法');
        }
        $result=$this->_db->where('admin_id='.$admin_id)->find();
        return $result;
    }

    public function getAdminUsers(){
        $data['status']=array('neq', -1);
        return $this->_db->where($data)->select();
    }

    public function insert($data=array()){
        if (!$data || !is_array($data)){
            throw_exception('数据不合法');
        }
        $data['password']=md5($data['password'].C('MD5_PRE'));
        $data['lastlogintime']=time();
        $data['lastloginip']=get_client_ip();
//        print_r($data);exit;
        return $this->_db->add($data);
    }

    public function updateByAdminId($admin_id, $data=array()){
        if (!$admin_id || !is_numeric($admin_id)){
            throw_exception('ID不合法');
        }
        if (!$data || !is_array($data)){
            throw_exception('数据不合法');
        }
        return $this->_db->where('admin_id='.$admin_id)->save($data);
    }

    public function updateStatusById($admin_id, $status){
        if (!$admin_id || !is_numeric($admin_id)){
            throw_exception('ID不合法');
        }
        $data['status']=intval($status);
        return $this->_db->where('admin_id='.$admin_id)->save($data);
    }
}