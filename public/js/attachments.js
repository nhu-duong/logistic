/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var myattachments = {};
myattachments.init = function() {
    $('#btnUploadAttachment').click(this.uploadAttachment);
};

myattachments.uploadAttachment = function() {
    var myFormData = new FormData();
    var inputs = $("#attachment");
    var hasAttachment = false;
    $.each(inputs, function (obj, v) {
        if (v.files.length === 0) {
            return false;
        }
        var file = v.files[0];
//        var filename = $(v).attr("data-filename");
        var name = $(v).attr("name");
        myFormData.append(name, file);
        hasAttachment = true;
    });
    if (!hasAttachment) {
        return false;
    }
    $.ajax({
        url: $('#uploadUrl').val(),
        data: myFormData,
        method: 'post',
        dataType: 'JSON',
        cache: false,
        contentType: false,
        processData: false,
        success: function (resp) {
            if (resp.result === 1) {
                myattachments.appendToList(resp.html);
                return;
            }
            alert(resp.message);
        },
        error: function () {
            $('#client-modal-notification-content').html($('#connection_error').val());
        }
    });
    return false;
};

myattachments.appendToList = function(attachmentRow) {
    $('#attachmentTable tbody').append(attachmentRow);
};
myattachments.init();