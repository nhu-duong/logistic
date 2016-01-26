/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $(document).on('change', '.update-hidden', function(e) {
        var obj = e.currentTarget;
        var target = $(obj).attr('data-target');
        $('#' + target).val($(obj).val());
    });
    $(document).on('click', '.delete-item', function(e) {
        var obj = e.currentTarget;
        var deleteUrl = $(obj).data('delete-url');
        var shouldBeRemovedSelector = $(obj).data('should-be-removed');
        if (typeof deleteUrl === 'undefined' || deleteUrl.length < 1) {
            return;
        }
        
        bootbox.confirm('Do you want to delete?', function(result) {
            if (!result) {
                return;
            }
            
            deleteItem(deleteUrl, shouldBeRemovedSelector);
        });
    });
});

var deleteItem = function(url, shouldBeRemovedSelector) {
    $.ajax({
        url: url,
        method: 'DELETE',
        dataType: 'json',
        success: function(data) {
            if (data.result !== 1) {
                bootbox.alert(data.message);
                return;
            }
            
            if (typeof shouldBeRemovedSelector !== 'undefined' && shouldBeRemovedSelector.length > 0) {
                $(shouldBeRemovedSelector).remove();
            }
            bootbox.alert('Delete item successfully!');
        },
        error: function() {
            bootbox.alert('Can not delete item. There is an unknown error.');
        }
    });
};

var showError = function(message) {
    alert(message);
};

var showMessage = function(message) {
    alert(message);
};

var showCommonError = function() {
    showError("There's an error, please reload the page and try again!");
};