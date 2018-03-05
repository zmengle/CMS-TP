<?php
namespace Common\Model;
use Think\Model;

class MenuModel extends Model{

    private $_db='';

    public function __construct(){
        $this->_db=M('menu');
    }

    public function insert($data=array()){
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }

    /**
     * 分页列表
     */
    public function getMenus($data, $page, $pageSize=10){
        $data['status']=array(array('neq','-1'));
        $start=($page-1)*$pageSize;
        $resList=$this->_db->where($data)->order('listorder desc,menu_id desc')->limit($start, $pageSize)->select();
        return $resList;
    }

    public function getMenusCount($data){
        $data['status']=array(array('neq','-1'));
        return $this->_db->where($data)->count();
    }

    /**
     * 查找一条
     */
    public function findOne($id){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        return $this->_db->where('menu_id='.$id)->find();
    }

    /**
     * 保存一条数据
     */
    public function updateByMenuId($id, $data){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if (!$data || !is_array($data)){
            throw_exception('更新数据不合法');
        }
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 删除更新状态
     */
    public function updateStatusById($id, $status){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if (!$status || !is_numeric($status)){
            throw_exception('状态不合法');
        }
        $data['status']=$status;
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 排序状态更新
     */
    public function updateListorderById($id, $listorder){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['listorder']=$listorder;
        return $this->_db->where('menu_id='.$id)->save($data);
    }

    /**
     * 获取后台菜单
     */
    public function getAdminMenus(){
        $data=array(
            'status'=>array('neq', -1),
            'type'=>array('eq', 1)
        );
        return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
    }

    /**
     * 获取前台菜单
     */
    public function getHomeMenus(){
        $data=array(
            'status'=>array('eq',1),
            'type'=>array('eq',0)
        );
        return $this->_db
            ->field('menu_id,name')
            ->where($data)
            ->order('listorder desc,menu_id desc')
            ->select();
    }
    public function findOneHomeMenu($id){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['menu_id']=$id;
        $data['type']=0;
        return $this->_db->where($data)->find();
    }

}