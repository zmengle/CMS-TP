<?php
/**
 * Created by PhpStorm.
 * User: LE
 * Date: 2017/9/1
 * Time: 13:35
 */
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
use Think\Think;

class DetailController extends CommonController
{
    public function __construct(){
        parent::__construct();
    }

    public function index($mode=''){
        if ($_GET) {
            if (!isset($_GET['news_id']) || !$_GET['news_id']) {
                $this->errorShow('ID不合法');
            }
            $id = intval($_GET['news_id']);
//            print_r($id);exit;
            try {
                $new = D('News')->getNewById($id);
                if ($new === false) {
                    $this->errorShow('获取文章失败');
                }
                $count=intval($new['count']+1);
                $row=D('News')->updateCount($id, $count);
                if ($row===false){
                    $this->errorShow('计数更新失败');
                }
                $newContent = D('NewsContent')->getContentByNewsId($id);
                if ($newContent === false) {
                    $this->errorShow('获取文章内容失败');
                }
                $prevNews = D('News')->getPrevNewById($id);
                $prevNew=$prevNews[0];
                if ($prevNew === false) {
                    $this->errorShow('获取上一条文章失败');
                }
                $nextNew = D('News')->getNextNewById($id);
                if ($nextNew === false) {
                    $this->errorShow('获取下一条文章失败');
                }
                $detail=array(
                    'new'=>$new,
                    'newContent'=>$newContent,
                    'prevNew'=>$prevNew,
                    'nextNew'=>$nextNew
                );
                $this->assign('detail', $detail);
            } catch (Exception $err) {
                $this->errorShow('异常'.$err->getMessage());
            }
            $mode?$this->display($mode): $this->display();
        }else{
            $this->errorShow('找不到文章ID');
        }
    }

    /**
     * 后台预览使用
     */
    public function view(){
        if (!getAdminUser()){
            $this->errorShow('没有权限访问');
        }
        $this->index('Detail/index');
    }
}