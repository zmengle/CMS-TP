<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class PositionController extends CommonController {
    
    public function index(){
        $data=array();
        $page=$_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:2;


        $lists=D('Position')->getPositionList($data, $page, $pageSize);
        $count=D("Position")->getCount();
        $pageRes=new \Think\Page($count, $pageSize);
        $pageShow=$pageRes->show();

        $this->assign('lists', $lists);
        $this->assign('pageShow', $pageShow);
        $this->display();

    }

    public function add(){
        if ($_POST){
//            print_r($_POST);
            if(!isset($_POST['name']) || !$_POST['name']){
                return show(0, '名称不能为空');
            }
            if(!isset($_POST['description']) || !$_POST['description']){
                return show(0, '描述不能为空');
            }
            if(isset($_POST['status']) && $_POST['status']){
                $_POST['status']=intval($_POST['status']);
            }
            if(isset($_POST['id']) && $_POST['id']){
                return $this->save();
            }
            try{
                $poID=D('Position')->insert($_POST);
                if ($poID===false){
                    return show(0, '新增失败');
                }
            }catch (Exception $err){
                return show(0, '异常'.$err->getMessage());
            }
            return show(1, '新增成功');

//            return show(0, '错误信息');

        }
        $this->display();
    }

    public function edit(){
        if($_GET['id']){
            $id=intval($_GET['id']);
            try{
                $position=D('Position')->getOneById($id);
                if ($position===false){
                    return show(0, '找不到信息');
                }
            }catch (Exception $err){
                return show(0,'异常'.$err->getMessage());
            }
            $this->assign('cur_position', $position);
        }
        //提示 return show(0,'参数无效');
        $this->display();
    }

    public function save(){
        if($_POST){
            $id=$_POST['id'];
            unset($_POST['id']);
            try{
                $p_id=D('Position')->updateById($id, $_POST);
                if ($p_id===false){
                    return show(0, '更新失败');
                }
            }catch (Exception $err){
                return show(0, '异常'.$err->getMessage());
            }
            return show(1,'更新成功');
        }
        return show(0,'数据有误');
    }

    public function del(){
        return $this->setStatus();
    }

    public function setStatus(){
        if($_POST){
            $id=$_POST['id'];
            $status=intval($_POST['status']);
            $data['status']=$status;
            $res=array('del'=>'删除','close'=>'关闭','open'=>'开启');
            $result='';

            if(isset($status) && in_array($status, array(-1,0,1))){
                if ($status==-1){
                    $result=$res['del'];
                }else if ($status==0){
                    $result=$res['close'];
                }else if ($status==1){
                    $result=$res['open'];
                }
                try{
                    $p_id=D('Position')->updateById($id, $data);
                    if ($p_id===false){
                        return show(0, $result.'失败');
                    }
                }catch (Exception $err){
                    return show(0, '异常'.$err->getMessage());
                }
                return show(1,$result.'成功');
            }
            return show(0,'失败',array('status'=>$status));
//            switch ($status){
//                case -1:
//                    try{
//                        $p_id=D('Position')->updateById($id, $data);
//                        if ($p_id===false){
//                            return show(0, '删除失败');
//                        }
//                    }catch (Exception $err){
//                        return show(0, '异常'.$err->getMessage());
//                    }
//                    return show(0,'删除成功');
//                case 0:
//                    try{
//                        $p_id=D('Position')->updateById($id, $data);
//                        if ($p_id===false){
//                            return show(0, '删除失败');
//                        }
//                    }catch (Exception $err){
//                        return show(0, '异常'.$err->getMessage());
//                    }
//                    return show(0,'删除成功');
//                case 1:
//                    try{
//                        $p_id=D('Position')->updateById($id, $data);
//                        if ($p_id===false){
//                            return show(0, '删除失败');
//                        }
//                    }catch (Exception $err){
//                        return show(0, '异常'.$err->getMessage());
//                    }
//                    return show(0,'删除成功');
//                default:
//                    return show(0,'状态值有误', array('status'=>$status));
//            }
        }

    }






















    public function test(){
        //用于临时学习checkbox 的测试文件 忽略
        $this->display();

//        $status=0;
//        if ($res=in_array($status,array(-1,0,1))){
//            echo $res;
//        }

        $errors=array('1'=>'ss', '2'=>'dd');
//        print_r(implode(',',$errors));
    }
    
}