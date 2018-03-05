/**
 * 前端登录业务类
 */
var login = {
    check:function(){
        //检查数据
        var username=$('input[name="username"]').val();
        var password=$('input[name="password"]').val();

        if(!username){
            dialog.error('用户名为空！');
           return 0;
        }
        if(!password){
            dialog.error('密码为空！');
            return 0;
        }

        var url="index.php?m=admin&c=login&a=check";
        var data={'username':username,'password':password};
        $.post(url, data, function(result){
            if (result.status==0) {
                return dialog.error(result.message);
            }
            if (result.status==1) {
                return dialog.success(result.message,
                    'index.php?m=admin&c=index');
            };
        },'json');
    }
}