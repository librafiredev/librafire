/*
*  File Upload
* */

jQuery(document).ready(function ($) {

    $("#fileupload").uploadFile({
        url: root.ajax,
        fileName: "uploadfile",
        returnType: "json",
        dynamicFormData: function()
        {
            var data = { action: 'upload_file'};
            return data;
        },
        maxFileCount: 1,
        maxFileSize: 10000 * 1024,
        allowedTypes: "pdf,doc,docx",
        showDelete: true,
        uploadStr: 'Browse',
        multiple: false,
        dragDrop: false,
        showFileCounter: false,
        extErrorStr: 'is not allowed. Only: ',
        deleteCallback: function (data, pd) {
            for (var i = 0; i < data.length; i++) {
                $.post(root.ajax, {action: 'delete_file', op: "delete", name: data[i]},
                    function (resp, textStatus, jqXHR) {
                        //console.log(resp);
                    });
            }
            pd.statusbar.hide();
        },
        onSuccess: function (files, data, xhr, pd) {
            //console.log(data);
        }
    });

});