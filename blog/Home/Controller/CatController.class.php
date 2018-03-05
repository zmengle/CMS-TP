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

class CatController extends CommonController
{
    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
//        print_r($_GET);exit;
        if ($_GET) {
            if (!isset($_GET['catid']) || !$_GET['catid']) {
               $this->errorShow('ID不合法');
            }
            $catid=intval($_GET['catid']);
            try {
                $menu=D('Menu')->findOneHomeMenu($catid);
                if ($menu===false || $menu['status']!=1){
                    $this->errorShow('栏目不存在或者栏目被关闭');
                }
                $news = D('News')->getNewsByCatid($catid);
                if ($news === false) {
                    $this->errorShow('获取文章失败');
                }
            } catch (Exception $err) {
                $this->errorShow('异常' . $err->getMessage());
            }
            $this->assign('news', $news);
        }
        $this->display();
    }
}