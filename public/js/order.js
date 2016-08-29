/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var myorder = {};
myorder.init = function() {
    $('.delete-cont').click(this.deleteCont);
    $('#orderForm').on('submit', this.validateForm);
    $('#export_house_bill').click(this.exportHouseBill);
};

myorder.exportHouseBill = function() {
    if ($('#table_orders input:checked').length === 0) {
        showMessage('Please choose an order!');
        return false;
    }
    $('#table_orders input:checked').each(function() {
        var link = $('#export_house_bill_link').val();
//        link.replace('88888888', $(this).val());
        window.open(link.replace('88888888', $(this).val()), '_blank');
//        showMessage($(this).val());
    });
    return false;
};

myorder.validateForm = function() {
    if ($('#master_bill_no').val().length === 0) {
        showError('Please enter master bill number');
        return false;
    }
    if ($('#house_bill_no').val().length === 0) {
        showError('Please enter house bill number');
        return false;
    }
    return true;
};

myorder.deleteCont = function(event) {
    if (!confirm('Are you really want to delete this container?')) {
        return;
    }
    
    var url = $(event.currentTarget).data('url');
    $.ajax({
        url: url,
        type: 'delete',
        dataType: 'json',
        success: function(resp) {
            if (resp.result === 1) {
                $('#cont_' + resp.contId).remove();
                showMessage('Remove container successfully!');
            }
        }
    });
};
myorder.init();