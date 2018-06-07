import $ from 'jquery';

const app = {};
window.$ = $;
require('datatables.net');
require('admin-lte/dist/js/adminlte.min.js');
require('trumbowyg');

$('document').ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $('textarea.turmbowyg').trumbowyg({autogrow: true, svgPath: '/img/icons.svg'});
});

app.General = (function() {
    const init = function() {
        adminSimpleDataTable();
        confirmDeleteItem();
    };

    /**
     * simple function
     */
    const adminSimpleDataTable = function(){
        $(document).ready(function(){
            $('#adminSimpleDataTable').DataTable();
        });
    };

    /**
     * confirm message when delete item with class need-confirm
     */
    const confirmDeleteItem = function(){
        $(document).ready(function(){
            $('a.need-confirm').click(function () {
                var itemName = $(this).data('item');
                if (confirm('Точно удалить ' + itemName + '?')) {
                    location.href = $(this).attr('href') + '/' + $(this).data('id');
                }
                return false;
            });
        });
    };

    return {
        init: init
    }
}());

app.Product = (function () {
    const initDataTable = function () {
        $(document).ready(function () {
            var table = $('#asyncProductTable').DataTable({
            });

            $('#categoryFilterSelect').on('change select', function () {
                table.column(2).search($(this).val()).draw();
            });
            $('#brandFilterSelect').on('change select', function () {
                table.column(3).search($(this).val()).draw();
            });
            $('#avaiabilityFilterSelect').on('change select', function () {
                table.column(4).search($(this).val(), false, false, false).draw();
            });
        });
    };

    return {
        initDataTable: initDataTable
    }
}());

if (typeof window.app === 'undefined') {
    window.app = app;
}
window.app.General.init();