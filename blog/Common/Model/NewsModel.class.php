<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/17
 * Time: 11:54
 */

namespace Common\Model;
use Think\Model;

class NewsModel extends Model{
    private $_db='';
    public function __construct(){
        $this->_db=M('news');
    }

    public function countNews(){
        $data=array(
            'status'=>array('neq', -1)
        );
        return $this->_db->where($data)->count('news_id');
    }

    public function countMaxNew(){
        $max=$this->_db->Max('count');
        $new=$this->_db->where('count='.intval($max))->find();
        return $new;
    }

    public function insert($data=array()){
        if (!$data || !is_array($data)){
            throw_exception('数据出错');
        }
        $data['create_time']=time();
        $data['username']=getAdminUser();
        return $this->_db->add($data);
    }

    public function getNews($data=array(), $page, $pageSize=10){
        if (!isset($data) || !is_array($data)){
            return false;
        }
        if(isset($data['title']) && $data['title']){
            $data['title']=array('like','%'.$data['title'].'%');
        }
        if (isset($data['catid']) && $data['catid']){
            $data['catid']=intval($data['catid']);
        }
        $data['status']=array('neq',-1);
        $start=($page-1)*$pageSize;
        $list=$this->_db->where($data)->order('listorder desc,news_id desc')->limit($start, $pageSize)->select();
        return $list;

    }
    //点击量
    public function getNewsByCount(){
        $data['status']=array('eq', 1);
        $list=$this->_db->where($data)->field('news_id , title , description')->order('count desc , listorder desc')->limit(10)->select();
        return $list;
    }

    public function getNewsCount($data=array()){
        if (!isset($data) || !is_array($data)){
            return false;
        }
        if(isset($data['title']) && $data['title']){
            $data['title']=array('like','%'.$data['title'].'%');
        }
        if (isset($data['catid']) && $data['catid']){
            $data['catid']=intval($data['catid']);
        }
        $data['status']=array('neq',-1);
        return $this->_db->where($data)->count();
    }

    public function findOne($id){
        if(!$id || !is_numeric($id)){
            return 'ID不合法';
        }
        return $this->_db->where('news_id='.$id)->find();
    }

    public function findNewsByIds($ids){
        if (!$ids || !is_array($ids)){
            throw_exception('数据不合法');
        }
        foreach ($ids as $id){
            if (!$id || !is_numeric($id)){
                throw_exception('ID不合法');
            }
        }
        $data=array(
            'news_id'=>array('in',implode(',', $ids)),
        );
        return $this->_db
                    ->where($data)
                    ->field(implode(',', array('news_id', 'title', 'thumb', 'status','count')))
                    ->select();
    }

    public function updateById($id, $data){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if (!$data || !is_array($data)){
            throw_exception('数据不合法');
        }
        return $this->_db->where('news_id='.$id)->save($data);
    }

    public function updateStatusById($id, $status){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if (!isset($status)){
            throw_exception('状态值不存在');
        }
        $data['status']=intval($status);
        return $this->_db->where('news_id='.$id)->save($data);
    }

    public function updateOrder($id, $order){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!isset($order) || !is_numeric($order)){
            throw_exception('数据不合法');
        }
        $data['listorder']=intval($order);
        return $this->_db->where('news_id='.$id)->save($data);
    }
//    以下是前端的内容获取
    public function getAllNews(){
        $data['status']=array('eq', 1);
        $list=$this->_db->where($data)->order('create_time desc')->select();
        return $list;
    }

    public function getNewsByCatid($id){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['catid']=array('eq', $id);
        $data['status']=array('eq', 1);
        return $this->_db->where($data)->order('create_time desc ,listorder desc')->select();
    }

    public function getNewById($id){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['news_id']=array('eq', $id);
        $data['status']=array('eq', 1);
        return $new=$this->_db->where($data)->find();
    }

    public function getPrevNewById($id){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['news_id']=array('lt', $id);
        $data['status']=array('eq', 1);
        return $this->_db->where($data)->field('news_id, title')->order('news_id desc')->select();
    }
    public function getNextNewById($id){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['news_id']=array('gt', $id);
        $data['status']=array('eq', 1);
        return $this->_db->where($data)->field('news_id, title')->find();
    }

    public function updateCount($id, $count){
        if (!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if (!$count || !is_numeric($count)){
            throw_exception('计数不合法');
        }
        $data['count']=$count;
        return $this->_db->where('news_id='.$id)->save($data);
    }

}