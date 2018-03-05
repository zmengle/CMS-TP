<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/17
 * Time: 11:54
 */

namespace Common\Model;
use Think\Model;

class NewsContentModel extends Model{

    private $_db='';
    public function __construct(){
        $this->_db=M('news_content');
    }

    public function insert($data=array()){
        if (!$data || !is_array($data)){
            throw_exception('数据出错');
        }
        if (!isset($data['content']) && !$data['content']){
            $data['content']=htmlspecialchars($data['content']);
        }
        $data['create_time']=time();
        return $this->_db->add($data);
    }

    public function findOneContent($news_id){
        if (!$news_id || !is_numeric($news_id)){
            return 'ID不合法';
        }
        return $this->_db->where('news_id='.$news_id)->find();
    }

    public function updateByNewsId($news_id, $data){
        if (!$news_id || !is_numeric($news_id)){
            throw_exception('ID不合法');
        }
        if (!$data || !is_array($data)){
            throw_exception('数据不合法');
        }
        $data['content']?htmlspecialchars($data['content']):null;
        return $this->_db->where('news_id='.$news_id)->save($data);
    }

//    前台获取文章内容
    public function getContentByNewsId($news_id){
        if (!$news_id || !is_numeric($news_id)){
            return 'ID不合法';
        }
        return $this->_db->where('news_id='.$news_id)->find();
    }

}