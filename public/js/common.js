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
});
