<?php 
/**
 * 公共函数
 */
//显示返回的信息
function show($status, $message, $data=array()){
    $result=array(
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
        );
    exit(json_encode($result));
}

// md5加密的密码
function getMd5Password($password){
    return md5($password . C('MD5_PRE'));
}

// type值的转化
function getMenuType($type){
    return $type==1?"后台菜单":"前台菜单";
}

// status值的转化
function getStatus($status){
    if($status==1){
        $str='正常';
    }else if($status==0){
        $str='关闭';
    }else if($status==-1){
        $str='删除';
    }else{
        $str='未知';
    }
    return $str;
}

//导航地址组装
function getAdminMenuUrl($a_menu){
    $url='/admin.php?c='.$a_menu['c'].'&a='.$a_menu['f'];
    if ($a_menu['f']=='index'){
        $url='/admin.php?c='.$a_menu['c'];
    }
    return $url;
}

//导航高亮
function setActive($menu_c){
    $c=strtolower(CONTROLLER_NAME);
    if($menu_c==$c){
        return "active";
    }
    return '';
}

//kindeditor 数据返回格式化
function kindShow($status, $data){
    header('Content-Type:application/json;charset=UTF-8');
//    header('Content-type: text/html; charset=UTF-8');
    if ($status==0){
        exit(json_encode(array('error'=>$status, 'url'=>$data)));
    }
   exit(json_encode(array('error'=>1, 'message'=>'上传失败')));
}
//获取当前用户名
function getAdminUser(){
    if (session('adminUser')){
        return $_SESSION['adminUser']['username']?$_SESSION['adminUser']['username']:'';
    }
    return false;
}
//通过catid 获取导航名
function getMenu($homeMenus, $catid){
    $menuList=array();
    foreach ($homeMenus as $nav){
        $menuList[$nav['menu_id']]=$nav['name'];
    }
    return isset($menuList[$catid])?$menuList[$catid]:'';
}
//来源的格式化
function getCopyFromByAddr($addr){
    $copy_from=C('COPY_FROM');
    foreach ($copy_from as $k=>$v){
        $copy_from[$v]=$k;
    }
    return isset($copy_from[$addr])?$copy_from[$addr]:'';
}
//时间格式化
function setDate($time){
    return date('Y-m-d H:i',$time);
}
//判断是否存在封面图
function isHasThumb($thumb){
    if ($thumb){
        return '<span style="color: red;">有</span>';
    }
    return '<span style="color: #9d9d9d;">无</span>';
}
//通过position_id 获取推荐位名
function getPositionName($positions, $position_id){
    $positionList=array();
    foreach ($positions as $position){
        $positionList[$position['id']]=$position['name'];
    }
    return isset($positionList[$position_id])?$positionList[$position_id]:'';
}
//前端导航地址组装
function getHomeMenuUrl($catid){
    $url="/index.php?c=cat&catid=".$catid;
    return $url;
}
//标题过长截取
function getLengthTitle($length, $str=''){
    if ($str){
        if(strlen($str) > $length){
//            $str=mb_substr($str, 0, $length, 'utf-8');
            $str=substr($str, 0, $length);
            return $str."...";
        }
        return $str;
    }
    return '无标题';
}
//标题地址组装
function getNewUrl($news_id){
    $url="/index.php?c=detail&news_id=".$news_id;
    return $url;
}
//关键词美化
function getKeyTags($str){
    $str_arr=explode(',', $str);
    $new_str='';
    foreach ($str_arr as $str_key){
        $new_str.="<span class='badge'>".$str_key."</span>";
    }
    return $new_str;
}
//点击次数美化
function getCountTags($count){
    return intval($count/10000)>0?intval($count/10000).'万+':$count;
}

