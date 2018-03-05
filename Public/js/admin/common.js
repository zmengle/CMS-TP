/**
 * 添加按钮操作
 */
$('#button-add').click(function(){
    var url=SCOPE.add_url;
    window.location.href=url;
});

/**
 * 处理form
 */
//添加
$('#menu_add_sub').click(function(){
    dealForm($('#menu_add'));
});
$('#news_add_sub').click(function(){
    dealForm($('#news_add'));
});
$('#position_add_sub').click(function(){
    dealForm($('#position_add'));
});
$('#p_c_add_sub').click(function(){
    dealForm($('#p_c_add'));
});
$('#admin_add_sub').click(function () {
    dealForm($('#admin_add'));
});
//编辑后处理
$('#menu_edit_sub').click(function () {
    dealForm($('#menu_edit'));
});
$('#new_edit_sub').click(function () {
    dealForm($('#new_edit'));
});
$('#position_edit_sub').click(function () {
    dealForm($('#position_edit'));
});
$('#admin_edit_sub').click(function () {
    dealForm($('#admin_edit'));
});
$('#personal_edit_sub').click(function () {
    dealForm($('#personal_edit'));
});
function dealForm(formData) {
    var data=formData.serializeArray();
    var postData={};
    $(data).each(function(i,e){
        postData[this.name]=this.value;
    });
    console.log(postData);
    // 用ajax将数据传递给服务器
    var url=SCOPE.save_url;
    var jump_url=SCOPE.jump_url;
    $.post(url, postData, function(result){
        if (result.status==1) {
            return dialog.success(result.message,jump_url);
        }else if(result.status==0) {
            return dialog.error(result.message);
        };
    },'json');
}
/**
 * 编辑模型
 */
$('.menu_list #menu_edit').on('click', function () {
    var id=$(this).attr('attr-id');
    var url=SCOPE.edit_url+"&id="+id;
    window.location.href=url;
});
$('.new_list #new_edit').on('click', function () {
    var id=$(this).attr('attr-id');
    var url=SCOPE.edit_url+"&id="+id;
    window.location.href=url;
});
$('.position_list #position_edit').on('click', function () {
    var id=$(this).attr('attr-id');
    var url=SCOPE.edit_url+"&id="+id;
    window.location.href=url;
});
$('.p_c_list #p_c_edit').on('click', function () {
    var id=$(this).attr('attr-id');
    var url=SCOPE.edit_url+"&id="+id;
    window.location.href=url;
});
$('.admin_list #admin_edit').on('click', function () {
    var id=$(this).attr('attr-id');
    var url=SCOPE.edit_url+"&id="+id;
    window.location.href=url;
});
/*
* 删除模型
* */
$('.menu_list #menu_del').on('click', function () {
    var id=$(this).attr('attr-id');
    var a=$(this).attr('attr-a');
    var message=$(this).attr('attr-message');
    var data={};
    data['id']=id;
    data['status']=-1;
    var url=SCOPE.del_url;

    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认提交'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function (s) {
            todelete(url,data);
        }
    });
});
$('.new_list #new_del').on('click', function () {
    var id=$(this).attr('attr-id');
    var a=$(this).attr('attr-a');
    var message=$(this).attr('attr-message');
    var data={};
    data['id']=id;
    data['status']=-1;
    var url=SCOPE.del_url;

    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认提交'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function (s) {
            todelete(url,data);
        }
    });
});
$('.position_list #position_del').on('click', function () {
    var id=$(this).attr('attr-id');
    var a=$(this).attr('attr-a');
    var message=$(this).attr('attr-message');
    var data={};
    data['id']=id;
    data['status']=-1;
    var url=SCOPE.del_url;

    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认提交'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function (s) {
            todelete(url,data);
        }
    });
});
$('.p_c_list #p_c_del').on('click', function () {
    var id=$(this).attr('attr-id');
    var a=$(this).attr('attr-a');
    var message=$(this).attr('attr-message');
    var data={};
    data['id']=id;
    data['status']=-1;
    var url=SCOPE.del_url;

    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认提交'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function (s) {
            todelete(url,data);
        }
    });
});
$('.admin_list #admin_del').on('click', function () {
    var id=$(this).attr('attr-id');
    var a=$(this).attr('attr-a');
    var message=$(this).attr('attr-message');
    var data={};
    data['id']=id;
    data['status']=-1;
    var url=SCOPE.del_url;

    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认提交'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function (s) {
            todelete(url,data);
        }
    });
});
function todelete(url, data) {
    $.post(url, data, function (result) {
        if(result.status==1){
            return dialog.success(result.message, SCOPE.jump_url);
        }
        if (result.status==0){
            return dialog.error(result.message);
        }
    },'json');
}
/*
* 状态修改
* */
$('.new_list #checkbox').on('mousedown', function () {
    var txt_status=$('#txt_status');
    var set_status=this;
    var id=$(set_status).attr('attr-id');
    var message=$(set_status).attr('attr-message');
    var url=SCOPE.set_status_url;
    var data={};
    data['id']=id;
    data['status']='';

    var cur_status=$(this).attr('checked')?true:false;
    if(cur_status===true){
        data['status']=0;
    }else if(cur_status===false){
        data['status']=1;
    }
    // console.log(cur_status);
    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认修改'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function () {
            $.post(url, data, function (result) {
                if(result.status==1){
                    if(cur_status===false){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.alert('成功', result.message, '1');
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.alert('成功', result.message, '1');
                }
                if(result.status==0){
                    if(cur_status===true){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.error(result.message);
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.error(result.message);
                }
            },'json');
        }
    });
});
$('.position_list #checkbox').on('mousedown', function () {
    var txt_status=$('#txt_status');
    var set_status=this;
    var id=$(set_status).attr('attr-id');
    var message=$(set_status).attr('attr-message');
    var url=SCOPE.set_status_url;
    var data={};
    data['id']=id;
    data['status']='';

    var cur_status=$(this).attr('checked')?true:false;
    if(cur_status===true){
        data['status']=0;
    }else if(cur_status===false){
        data['status']=1;
    }
    // console.log(cur_status);
    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认修改'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function () {
            $.post(url, data, function (result) {
                if(result.status==1){
                    if(cur_status===false){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.alert('成功', result.message, '1');
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.alert('成功', result.message, '1');
                }
                if(result.status==0){
                    if(cur_status===true){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.error(result.message);
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.error(result.message);
                }
            },'json');
        }
    });
});
$('.p_c_list #checkbox').on('mousedown', function () {
    var txt_status=$('#txt_status');
    var set_status=this;
    var id=$(set_status).attr('attr-id');
    var message=$(set_status).attr('attr-message');
    var url=SCOPE.set_status_url;
    var data={};
    data['id']=id;
    data['status']='';

    var cur_status=$(this).attr('checked')?true:false;
    if(cur_status===true){
        data['status']=0;
    }else if(cur_status===false){
        data['status']=1;
    }
    // console.log(cur_status);
    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认修改'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function () {
            $.post(url, data, function (result) {
                if(result.status==1){
                    if(cur_status===false){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.alert('成功', result.message, '1');
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.alert('成功', result.message, '1');
                }
                if(result.status==0){
                    if(cur_status===true){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.error(result.message);
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.error(result.message);
                }
            },'json');
        }
    });
});
$('.admin_list #checkbox').on('mousedown', function () {
    var txt_status=$('#txt_status');
    var set_status=this;
    var id=$(set_status).attr('attr-id');
    var message=$(set_status).attr('attr-message');
    var url=SCOPE.set_status_url;
    var data={};
    data['id']=id;
    data['status']='';

    var cur_status=$(this).attr('checked')?true:false;
    if(cur_status===true){
        data['status']=0;
    }else if(cur_status===false){
        data['status']=1;
    }
    // console.log(cur_status);
    layer.open({
        type:0,
        title:'是否提交？',
        content:'确认修改'+message,
        btn:['yes', 'no'],
        icon:3,
        closeBtn:2,
        scrollbar:true,
        yes:function () {
            $.post(url, data, function (result) {
                if(result.status==1){
                    if(cur_status===false){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.alert('成功', result.message, '1');
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.alert('成功', result.message, '1');
                }
                if(result.status==0){
                    if(cur_status===true){
                        $(set_status).attr("checked", true);
                        $(txt_status).html('正常');
                        return dialog.error(result.message);
                    }
                    $(set_status).attr("checked", false);
                    $(txt_status).html('关闭');
                    return dialog.error(result.message);
                }
            },'json');
        }
    });
});
/*
* 排序模型
* */
$('#menu_order').on('click', function () {
    dealOrder($('#menu_listOrder'), SCOPE.listorder_url, SCOPE.jump_url);
});
$('#new_order').on('click', function () {
    dealOrder($('#new_listOrder'), SCOPE.listorder_url, SCOPE.jump_url);
});
$('#p_c_order').on('click', function () {
    dealOrder($('#p_c_listOrder'), SCOPE.listorder_url, SCOPE.jump_url);
});
function dealOrder(formData, postUrl, jumpUrl) {
    var data=formData.serializeArray();
    var postData={};
    $(data).each(function(i,e){
        postData[this.name]=this.value;
    });
    // console.log(postData);
    // 用ajax将数据传递给服务器
    $.post(postUrl, postData, function(result){
        if (result.status==1) {
            return dialog.success(result.message,result.data.jump_url);
        }else if(result.status==0) {
            return dialog.error(result.message,result.data.jump_url);
        };
    },'json');
}

/**
 * 多选模型
 */
$("#checkall").mousedown(function () {
    var checkpushs=$('input[name=pushcheck]');
    var cur_status=$(this)[0].checked;
    // console.log(cur_status);
    if(cur_status===false){
        $(checkpushs).each(function (i,v) {
            v.checked=true;
        });
    }else if(cur_status===true){
        $(checkpushs).each(function (i,v) {
            v.checked=false;
        });
    }
});
/**
 * push模型
 */
$('#select_push_sub').on('click',function () {
    var pushs={};
    var postData={};
    var url=SCOPE.push_url;
    var id=$('#select_push').val();
    var checkpushs=$('input[name=pushcheck]:checked');
    $(checkpushs).each(function (i, v) {
        pushs[i]=$(this).val();
    });
    // console.log(pushs);
    postData['id']=id;
    postData['pushs']=pushs;
    $.post(url, postData, function(result){
        if (result.status==1) {
            return dialog.success(result.message,result.data.jump_url);
        }else if(result.status==0) {
            return dialog.error(result.message,result.data.jump_url);
        };
    },'json');
});
/**
* 基本配置的添加保存
* */
$('#basic_add_sub').on('click', function () {
    dealForm($('#basic_content'));
});
/**
 * 更新缓存
 */
$('#update_cache').on('click', function () {
    console.log('更新缓存');
});
/**
 * 预览
 */
$('#new_view').on('click', function () {
    var news_id=$(this).attr('attr-id');
    var url="/index.php?c=detail&a=view&news_id="+news_id;
    window.open(url);
});


