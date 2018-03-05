<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/8/17
 * Time: 11:59
 */
namespace Admin\Controller;
use Think\Controller;

class ImageController extends CommonController{

    const UPLOAD_PATH = 'Uploads';

    public function ajaxUploadImage()
    {
        $uplodImage=D('UploadImage');
        $imgSrc=$uplodImage->uploadImage();
        if ($imgSrc===false){
            return show(0, '上传失败');
        }else if(!is_file($imgSrc)){
            return show( 0, '文件出错');
        }
        return show( 1, '上传成功', array('imgSrc'=>$imgSrc));
    }

    public function kindUpload(){
        $uploadImage=D('UploadImage');
        $imgSrc=$uploadImage->kindUpload();

        if ($imgSrc===false){
            return kindShow(1, '上传失败');
        }
        return kindShow(0, $imgSrc);

    }
}