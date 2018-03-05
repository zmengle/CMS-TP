<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/17
 * Time: 11:54
 */

namespace Common\Model;
use Think\Model;

class UploadImageModel extends Model{

    const UPLOAD_ROOT='Uploads';
    private $_rootPath='';
    private $_db='';
    private $_uploadObj='';
    public function __construct(){
        $this->_rootPath='./'.self::UPLOAD_ROOT.'/';
        $config=array(
            'rootPath'=> $this->_rootPath
        );//默认'rootPath':'./Uploads/'
        $this->_uploadObj=new \Think\Upload($config);
    }

    public function uploadImage () {
        $info=$this->_uploadObj->upload();
//        print_r($info);exit;
        if ($info){
            return $this->_rootPath.$info['file']['savepath'].$info['file']['savename'];
        }
        return false;
    }

    public function kindUpload () {
        $info=$this->_uploadObj->upload();
//                print_r($info);exit;
        if ($info){
            return $this->_rootPath.$info['imgFile']['savepath'].$info['imgFile']['savename'];
        }
        return false;
    }

}