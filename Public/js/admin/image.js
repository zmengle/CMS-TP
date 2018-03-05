/*
* 图片上传
* */
$(function () {
    $('#file_upload').uploadify({
        'swf':SCOPE.swf_url,
        'uploader':SCOPE.uploader_url,
        'buttonText':'上传图片',
        'fileTyleDesc':'Image File',
        'fileObjName':'file',
        'fileTypeExts':'*.jpg;*.jpeg;*.gif;*.png',
        'onSelectError':function () {
            // return dialog.error('选择错误');
        },
        'onUploadSuccess':function (file, data, respose) {
            //file 文件信息 data 返回信息 respose 上传状态
            // console.log(file.id);
            if (respose){
                var obj=JSON.parse(data);
                // console.log(obj);


                $("#file_upload_image").attr({'value':obj.data.imgSrc});
                $("#upload_org_code_img").attr({'src':obj.data.imgSrc});
                $("#upload_org_code_img").show();
                return dialog.alert('',obj.message,'1');
            }else{
                return dialog.error(obj.message);
            }
        }
    });
});