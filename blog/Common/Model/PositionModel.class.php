<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/20
 * Time: 22:05
 */
namespace Common\Model;
use Think\Model;

class PositionModel extends Model{

    private $_db='';
    public function __construct(){
        $this->_db=M('position');
    }

    public function countPosition(){
        $data['status']=array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function getPositionList($data=array(), $page=1, $pageSize=10){
        $data['status']=array('neq',-1);
        $start=($page-1)*$pageSize;
        return $this->_db
                    ->where($data)
                    ->order('id desc')
                    ->limit($start, $pageSize)
                    ->select();
    }

    public function getCount(){
        $data['status']=array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function insert($data){
        if (!$data || !is_array($data)){
            throw_exception('数据有误');
        }
        if(isset($data['status']) && $data['status']){
            $data['status']=intval($data['status']);
        }
        $data['create_time']=time();
        return $this->_db->add($data);
    }

    public function getOneById($id){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        return $this->_db->where('id='.$id)->find();
    }

    public function updateById($id, $data){
        if(!$id || !is_numeric($id)){
            throw_exception('ID 不合法');
        }
        if(!$data || !is_array($data)){
            throw_exception('数据有误');
        }
        return $this->_db->where('id='.$id)->save($data);
    }

    public function getPositionField(){
        $data['status']=array('neq',-1);
        return $this->_db
            ->where($data)
            ->field('id, name')
            ->order('id')
            ->select();
    }
}