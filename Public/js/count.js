/**
 * 计数js文件
 */
$(function () {
    var newsIds={};
    $('.news-count').each(function (i) {
        newsIds[i]=$(this).attr('attr-id');
    });
    var url=SCOPE.getCount_url;
    $.post(url, newsIds, function (result) {
        if (result.status==1){
            var counts=result.data;
            $.each(counts, function (news_id, count) {
                $('.node-'+news_id).html(count);
            });
        }else if(result.status==0){
            return dialog.error(result.message);
        }
    },'json');
});
