/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
if ($('.phone-number').length) {
    new Cleave('.phone-number', {
        phone: true,
        phoneRegionCode: 'br'
    });
}

if ($('.cpf').length) {
    new Cleave('.cpf', {
        delimiters: ['.', '.', '-'],
        blocks: [3, 3, 3, 2],
        uppercase: true
    });
}

if ($('#table-1').length) {
    $("#table-1").dataTable({
        "columnDefs": [
            {"sortable": false, "targets": [2, 3]}
        ]
    });
}

$(document).on('click', '.confirm-plugin', function () {
    var obj = $(this);
    var $message = obj.attr('data-message');
    var $title = obj.attr('data-title');
    $.confirm({
        theme: 'bootstrap',
        title: $title,
        type: 'dark',
        content: $message,
        closeIcon: true,
        closeIconClass: 'fas fa-times',
        buttons: {
            Cancelar: {
                btnClass: 'btn-sm btn-secondary',
                action: function () {
                }
            },
            Remover: {
                btnClass: 'btn-sm btn-danger',
                action: function () {
                    obj.closest('form').submit();
                }
            }
        }
    });
    return false;
});
