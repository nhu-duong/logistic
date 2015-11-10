/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var myselect = {};
myselect.init = function() {
    this.modalId = 'customCreateFormModal';
//    this.formId = 'customCreateFormId';
    this.initModal();
    $('#saveCustomForm').click(this.submitForm);
};

myselect.initModal = function() {
    $('.showCreateForm').click(function(event) {
        myselect.showPopup(event.currentTarget);
    });
};

myselect.showPopup = function(element) {
    var url = $(element).data('create-form-url');
    if (typeof url !== 'string' || url.length === 0) {
        showCommonError();
        return;
    }
    myselect.targetControlId = $(element).data('target-control');
    
    // Show modal
    $.get(url, function(formHtml) {
        $('#customCreateFormModal .modal-body').html(formHtml);
        $('#customCreateFormModal').modal('show');
    });
};

myselect.closePopup = function() {
    $('#customCreateFormModal').modal('hide');
};

myselect.updateSelect = function(selectId, value, title, previewControlId, previewContent) {
    // Update select, add new option
    $('#' + selectId).append('<option value="' + value + '">' + title + '</option>');
    // Select the last option
    $('#' + selectId).last().attr('selected', 'selected');
    //Update Preview content
    if (typeof previewControlId === 'string' && previewControlId.length > 0) {
        $('#' + previewControlId).val(previewContent);
    }
    // Close popup
    myselect.closePopup();
};

myselect.submitForm = function() {
    var formUrl = $('#' + myselect.modalId + ' form').attr('action');
    $.ajax({
        url: formUrl,
        type: 'post',
        dataType: 'json',
        data: $('#' + myselect.modalId + ' form').serialize(),
        success: function(resp) {
            if (resp.result === 1) {
                myselect.addObjToSelect(resp.address.id, resp.address.name, myselect.targetControlId);
                myselect.closePopup();
            }
            
        }
    });
};
myselect.addObjToSelect = function(value, label, targetControlId) {
    $('#' + targetControlId)
        .append($("<option></option>")
            .attr("value", value)
            .text(label))
        .val(value);
};
myselect.init();