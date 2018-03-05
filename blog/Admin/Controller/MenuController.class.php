<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class MenuController extends CommonController {
    
    public function index(){
        $data=array();
        /**
         * 搜索
         */
        if(isset($_REQUEST['type']) && in_array($_REQUEST['type'], array('0','1'))){
//            echo $_REQUEST['type'];
            $data['type']=intval($_REQUEST['type']);
//            echo $data['type'];
            $this->assign('type',$data['type']);
        }else{
            $this->assign('type',-1);
        }
        /**
         * 分页逻辑
         */
        $page=$_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:3;

        $menus=D('Menu')->getMenus($data, $page, $pageSize);
        $menusCount=D('Menu')->getMenusCount($data);

        // print_r($menus);
        // print_r($menusCount);
        $page=new \Think\Page($menusCount, $pageSize);
        $pageRes=$page->show();
        $this->assign('menus', $menus);
        $this->assign('pageRes', $pageRes);
        $this->display();
    }

    public function add(){
        if ($_POST) {
            if (!isset($_POST['name']) || !$_POST['name']) {
                return show(0, '菜单名不能为空');
            }
            if (!isset($_POST['m']) || !$_POST['m']) {
                return show(0, '模块名不能为空');
            }
            if (!isset($_POST['c']) || !$_POST['c']) {
                return show(0, '控制器不能为空');
            }
            if (!isset($_POST['f']) || !$_POST['f']) {
                return show(0, '方法名不能为空');
            }
            if ($_POST['menu_id']){
                return $this->save($_POST);
            }
            $menuID=D('Menu')->insert($_POST);
            if ($menuID) {
                return show(1, '新增成功', $menuID);
            }
            return show(0, '新增失败', $menuID);
        }else{
            $this->display();
        }
        
    }

    public function edit(){
        $menuID=$_GET['id'];
        $cur_menu=D('Menu')->findOne($menuID);
        $this->assign("menu", $cur_menu);
        $this->display();
    }

    public function save($data){
        $menuID=$data['menu_id'];
        unset($data['menu_id']);

        try{
            $menu_id=D('Menu')->updateByMenuId($menuID, $data);
            if ($menu_id===false){
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        }catch (Exception $err){
            return show(0, $err->getMessage());
        }
    }

    public function del(){
        return $this->setStatus();
    }

    public function setStatus(){
        try{
            if($_POST){
                $id=$_POST['id'];
                $status=$_POST['status'];
                $menu_id=D('Menu')->updateStatusById($id, $status);
                if ($menu_id===false){
                    return show(0, '删除失败');
                }
                return show(1, '删除成功');
            }
        }catch (Exception $err){
            return show(0, $err->getMessage());
        }
        return show(0, '未传值');
    }

    public function listorder(){
//        print_r($_POST);
        $listorder=$_POST['listorder'];
        $errors=array();
        $jump_url=$_SERVER['HTTP_REFERER'];
        if ($listorder){
            try{
                foreach ($listorder as $menu_id=>$v){
                    $menuID=D('Menu')->updateListorderById($menu_id, $v);
                    if ($menuID===false){
                        $errors[]=$menuID;
                    }
                }
            }catch(Exception $err){
                return show(0, $err->getMessage(), array('jump_url'=>$jump_url));
            }
            if($errors && count($errors)){
                return show(0, '排序失败-'.implode(',', $errors), array('jump_url'=>$jump_url));
            }
            return show(1, '排序成功', array('jump_url'=>$jump_url));
        }
        return show(0, '排序数据失败', array('jump_url'=>$jump_url));
    }
    
}