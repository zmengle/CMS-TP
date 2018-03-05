<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

class PositioncontentController extends CommonController {
    
    public function index(){
        $data=array();
        if(isset($_REQUEST['position_id']) && $_REQUEST['position_id']){
            $data['position_id']=intval($_REQUEST['position_id']);
            $this->assign('cur_position_id', $_REQUEST['position_id']);
        }else{
            $this->assign('cur_position_id',0);
        }
        if (isset($_REQUEST['title']) && $_REQUEST['title']){
            $data['title']=$_REQUEST['title'];
            $this->assign('cur_title', $_REQUEST['title']);
        }else{
            $this->assign('cur_title','');
        }

        $page=$_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize=$_REQUEST['pageSize']?$_REQUEST['pageSize']:2;
        $p_c_lists=D('PositionContent')->getContentList($data, $page, $pageSize);

        $count=D('PositionContent')->getCount($data);
        $pageRes=new \Think\Page($count, $pageSize);
        $pageShow=$pageRes->show();

        $this->assign('positions', D('Position')->getPositionField());
        $this->assign('lists', $p_c_lists);
        $this->assign('pageShow', $pageShow);
        $this->display();
    }

    public function edit(){
        if ($_GET){
            $id=intval($_GET['id']);
            if($id){
                try{
                    $pcInfo=D('PositionContent')->getOneById($id);
                    if ($pcInfo===false){
                        return show(0,'获取信息失败');
                    }
                }catch (Exception $err) {
                    return show(0, '异常' . $err->getMessage());
                }
                $this->assign('cur_pcInfo', $pcInfo);
            }
        }
        $this->assign('positions', D('Position')->getPositionField());
        $this->display();
    }

    public function add(){
        $positions=D("Position")->getPositionField();
        $this->assign('positions', $positions);

        if ($_POST){
            if(!isset($_POST['title']) || !$_POST['title']){
                return show(0, '标题为空');
            }
            if(!isset($_POST['position_id']) || !$_POST['position_id']){
                return show(0, '未选择推荐位');
            }
            if(isset($_POST['id']) && $_POST['id']){
                return $this->save();
            }
            try{
                $p_cId=D('PositionContent')->insert($_POST['position_id'], $_POST);
                if ($p_cId===false){
                    return show(0, '新增失败');
                }
            }catch (Exception $err){
                return show(0, '异常'.$err->getMessage());
            }
            return show(1, '新增成功');
        }
        $this->display();
    }

    public function push(){
        if ($_POST){
            $positionId=$_POST['id'];
            $pushs=$_POST['pushs'];
            $errors=array();
            $jump_url=$_SERVER['HTTP_REFERER'];
            if (!isset($positionId) || !$positionId){
                return show(0,'请选择推荐位');
            }
            if (!isset($pushs) || !is_array($pushs) || !$pushs){
                return show(0, '请选择推荐内容');
            }
            $newInfos=D('News')->findNewsByIds($pushs);
            $news=array();
            foreach ($newInfos as $key => $newInfo){
                $news[$newInfo['news_id']]=$newInfo;
            }
//            print_r($news);exit;
            try{
                foreach ($pushs as $push){
                    $id=D('PositionContent')->insert($positionId, $news[$push]);
                    if($id===false){
                        $errors[]=$push;
                    }
                }
            }catch (Exception $err){
                return show(0, '异常'.$err->getMessage());
            }
            if ($errors){
                return show(0, '推送失败'.implode(',',$errors), array('jump_url'=>$jump_url));
            }
            return show(1,'推送成功',array('jump_url'=>$jump_url));
        }

    }

    public function save(){
        if($_POST){
            $id=intval($_POST['id']);
            unset($_POST['id']);
            try{
                $p_cID=D('PositionContent')->updateById($id, $_POST);
                if ($p_cID===false){
                    return show( 0, '更新失败');
                }
            }catch (Exception $err){
                return show(0,'异常'.$err->getMessage());
            }
            return show(1,'更新成功');
        }
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
                    $p_c_id=D('PositionContent')->updateById($id, $data);
                    if ($p_c_id===false){
                        return show(0, $result.'失败');
                    }
                }catch (Exception $err){
                    return show(0, '异常'.$err->getMessage());
                }
                return show(1,$result.'成功');
            }
            return show(0,'失败',array('status'=>$status));
        }
    }

    public function listorder(){
        if ($_POST) {
//            print_r($_POST);
            $listOrder = $_POST['listorder'];
            $errors = array();
            $jump_url = $_SERVER['HTTP_REFERER'];
            $pc = D('PositionContent');
            if ($listOrder) {
                try {
                    foreach ($listOrder as $key => $value) {
                        $id = $pc->updateOrder($key, $value);
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