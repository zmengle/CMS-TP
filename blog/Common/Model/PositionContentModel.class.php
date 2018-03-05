<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/20
 * Time: 22:05
 */
namespace Common\Model;
use Think\Model;

class PositionContentModel extends Model{

    private $_db='';
    public function __construct(){
        $this->_db=M('position_content');
    }

    public function getContentList($data=array(), $page=1, $pageSize=10){
        if(!isset($data) || !is_array($data)){
            throw_exception('数据不合法');
        }
        if($data['position_id'] && is_numeric($data['position_id'])){
            $data['position_id']=intval($data['position_id']);
        }
        if(isset($data['title']) && $data['title']){
            $data['title']=array('like', '%'.$data['title'].'%');
        }
        $data['status']=array('neq',-1);
        $start=($page-1)*$pageSize;
        return $this->_db
                    ->where($data)
                    ->order('listorder desc ,id desc')
                    ->limit($start, $pageSize)
                    ->select();
    }

    public function getContentsByPositionId($p_id){
        if (!isset($p_id) || !is_numeric($p_id)){
            throw_exception("ID不合法");
        }
        $data['position_id']=array('eq', $p_id);
        $data['status']=array('eq', 1);
        return $this->_db
            ->where($data)
            ->order('listorder desc ,id desc')
            ->select();
    }

    public function getCount(){
        $data['status']=array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function insert($p_id, $data=array()){
        if (!$p_id || !is_numeric($p_id)){
            throw_exception('数据有误');
        }
        if(!$data || !is_array($data)){
            throw_exception('推送信息有误');
        }
        if ($data['news_id'] && !is_numeric($data['news_id'])){
            $data['news_id']=intval($data['news_id']);
        }
        $data['position_id']=intval($p_id);
        $data['create_time']=time();//这是推送的时间，不采用文章的时间
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

    public function updateOrder($id, $order){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!isset($order) || !is_numeric($order)){
            throw_exception('数据不合法');
        }
        $data['listorder']=intval($order);
        return $this->_db->where('id='.$id)->save($data);
    }
}