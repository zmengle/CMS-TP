<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class ContentController extends CommonController {

    public function index(){
        $conds=array();

        if($_GET['title']){
            $conds['title']=$_GET['title'];
            $this->assign('title', $_GET['title']);
        }
        if ($_GET['catid']){
            $conds['catid']=$_GET['catid'];
            $this->assign('menu_id', intval($_GET['catid']));
        }

        $pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:4;
        $page=$_REQUEST['p']?$_REQUEST['p']:1;

        $news=D("News")->getNews($conds, $page, $pageSize);
//        print_r($news);
        $count=D('News')->getNewsCount($conds);
//        echo $count;
        $positions=D('Position')->getPositionList();

        $pageRes=new \Think\Page($count, $pageSize);
        $pageShow=$pageRes->show();

        $this->assign('positions', $positions);
        $this->assign('homeMenus',D('Menu')->getHomeMenus());
        $this->assign('news', $news);
        $this->assign('pageShow', $pageShow);

        $this->display();
    }

    public function add(){
        if ($_POST){
            if (!isset($_POST['title']) || !$_POST['title']){
                return show(0,'标题不能为空');
            }
            if (!isset($_POST['small_title']) || !$_POST['small_title']){
                return show(0,'短标题不能为空');
            }
            if (!isset($_POST['catid']) || !$_POST['catid']){
                return show(0,'栏目不能为空');
            }
            if (!isset($_POST['keywords']) || !$_POST['keywords']){
                return show(0,'关键词不能为空');
            }
            if (!isset($_POST['content']) || !$_POST['content']){
                return show(0,'内容不能为空');
            }

            if($_POST['news_id']){
                return $this->save($_POST);
            }
            try{
                $newsID=D('News')->insert($_POST);
                if ($newsID===false){
                    return show(0,'新增失败');
                }else{
                    $newsContentData['news_id']=$newsID;
                    $newsContentData['content']=$_POST['content'];
                    $cID=D('NewsContent')->insert($newsContentData);
                    if ($cID===false){
                        return show(0,'内容新增失败');
                    }else{
                        return show(1,'新增成功');
                    }
                }
            }catch (Exception $err){
                return show(0,$err->getMessage());
            }



        }else{
            $homeMenus=D('Menu')->getHomeMenus();
            $titleFontColor=C('TITLE_FONT_COLOR');
            $copyFrom=C('COPY_FROM');
            $this->assign('homeMenus', $homeMenus);
            $this->assign('titleFontColor', $titleFontColor);
            $this->assign('copyFrom', $copyFrom);
            $this->display();
        }
    }

    public function edit(){
        if (isset($_GET['id'])){
            $newId=intval($_GET['id']);
            $new=D('News')->findOne($newId);
            if ($new===false){
                return show(0,'文章不存在');
            }
            $newContent=D('NewsContent')->findOneContent($newId);
            if ($newContent===false){
                return show(0,'文章内容不存在');
            }
            $new['content']=$newContent['content'];
//            print_r($new);
            $this->assign('cur_new', $new);
            $this->assign('title_font_color', C('TITLE_FONT_COLOR'));
            $this->assign('copy_from', C('COPY_FROM'));
            $this->assign('homeMenus', D('Menu')->getHomeMenus());
        }
        $this->display();
    }

    public function save($data){
        if ($data){
            $news_id=$data['news_id'];
            unset($data['news_id']);
            try{
                $newID=D('News')->updateById($news_id, $data);
                if ($newID===false){
                    return show(0,'主表更新失败');
                }
                $content['content']=$data['content'];
                $newContentID=D('NewsContent')->updateByNewsId($news_id, $content);
                if ($newContentID===false){
                    return show(0,'副表更新失败');
                }
            }catch(Exception $err){
                return show( 0, $err->getMessage());
            }
            return show(1,'更新成功');
        }
    }

    public function del(){
        return $this->setStatus();
    }

    public function setStatus(){
        if ($_POST){
            $newId=$_POST['id'];
            $status=intval($_POST['status']);
//            echo $status;
            switch (intval($status)){
                case '-1':
                    try{
                        $new_id=D('News')->updateStatusById($newId, $status);
                        if ($new_id===false){
                            return show(0, '删除失败');
                        }
                    }catch(Exception $err){
                        return show(0, '异常'.$err->getMessage());
                    }
                    return show(1,'删除成功');
                case '0':
                    try{
                        $new_id=D('News')->updateStatusById($newId, $status);
                        if ($new_id===false){
                            return show(0, '关闭失败');
                        }
                    }catch(Exception $err){
                        return show(0, '异常'.$err->getMessage());
                    }
                    return show(1,'关闭成功');
                case '1';
                    try{
                        $new_id=D('News')->updateStatusById($newId, $status);
                        if ($new_id===false){
                            return show(0, '开启失败');
                        }
                    }catch(Exception $err){
                        return show(0, '异常'.$err->getMessage());
                    }
                    return show(1,'开启成功');
                default:
                    return show(0, '状态参数有误');
            }
        }
    }

    public function listOrder(){
        if ($_POST) {
//            print_r($_POST);
            $listOrder = $_POST['listorder'];
            $errors = array();
            $jump_url = $_SERVER['HTTP_REFERER'];
            $News = D('News');
            if ($listOrder) {
                try {
                    foreach ($listOrder as $key => $value) {
                        $id = $News->updateOrder($key, $value);
                        if ($id === false) {
                            $errors[] = $key;
                        }
                    }
                    if ($errors) {
                        return show(0, '出错->' . implode(',', $errors), array('jump_url' => $jump_url));
                    }
                } catch (Exception $err) {
                    return show(0, '异常' . $err->getMessage(), array('jump_url' => $jump_url));
                }
                return show(1, '排序成功', array('jump_url' => $jump_url));
            }
        }
    }

}