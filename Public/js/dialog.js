var dialog={
    // 错误弹出层
    error:function(message){
        layer.open({
            title:'错误提示',
            content:message,
            icon:2
        });
    },

    // 成功弹出层
    success:function(message,url){
        layer.open({
            title:'成功提示',
            content:message,
            icon:1,
            yes:function(){
                location.href=url;
            }
        });
    },

    // 提示弹出层
    alert:function(title, message, icon){
        layer.open({
            title:title,
            content:message,
            icon:icon
        });
    },

    // 确认弹出层
    confirm:function(message, url){
        layer.open({
            title:'确认',
            content:message,
            btn:['是','否'],
            icon:3,
            yes:function(){
                location.href=url;
            }
        });
    },

    // 不跳转的确认弹出层
    toconfirm:function(message){
        layer.open({
            title:'确认',
            content:message,
            btn:['是'],
            icon:3
        });
    }
};