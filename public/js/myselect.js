/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var myselect = {};
myselect.init = function() {
    this.modalId = 'customCreateFormModal';
    this.formId = 'customCreateFormId';
    this.initModal();
};

myselect.initModal = function() {
    $('.showCreateForm').click(function(event) {
        myselect.showPopup(event.target);
    });
};

myselect.showPopup = function(element) {
    var url = $(element).attr('data-create-form-url');
    if (typeof url !== 'string' || url.length === 0) {
        showCommonError();
        return;
    }
    
    // Show modal
    $('#customCreateFormModal .modal-body').html('<iframe src="' + url + '" ></iframe>');
    $('#customCreateFormModal').modal('show');
};

myselect.closePopup = function() {
    $('#customCreateFormModal').modal('close');
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
    
};
myselect.init();