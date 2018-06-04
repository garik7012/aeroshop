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

if (typeof window.app === 'undefined') {
    window.app = app;
}
window.app.General.init();