import $ from 'jquery';

const app = {};
window.$ = $;
require('datatables.net');
require('admin-lte/dist/js/adminlte.min.js');
require('trumbowyg');
require('trumbowyg/dist/plugins/upload/trumbowyg.upload');

$('document').ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $('textarea.turmbowyg').trumbowyg({
        autogrow: true,
        svgPath: '/img/icons.svg',
        btnsDef: {
            // Create a new dropdown
            image: {
                dropdown: ['insertImage', 'upload'],
                ico: 'insertImage'
            }
        },
        // Redefine the button pane
        btns: [
            ['viewHTML'],
            ['formatting'],
            ['strong', 'em', 'del'],
            ['superscript', 'subscript'],
            ['link'],
            ['image'], // Our fresh created dropdown
            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
            ['unorderedList', 'orderedList'],
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ],
        plugins: {
            // Add imagur parameters to upload plugin for demo purposes
            upload: {
                serverPath: '/admin-side/upload-image',
                fileFieldName: 'image',
                urlPropertyName: 'image_url'
            }
        }
    });
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
                "ajax":{
                    "dataType": "json",
                    "type": "POST",
                },
                "columnDefs": [
                    {
                        "targets": 5,
                        "data": 5,
                        "render": function ( data, type, row, meta ) {
                            var str = data ? '<i class="fa fa-check"></i>' : '';
                            return str;
                        }
                    },
                    {
                        "targets": 6,
                        "data": 6,
                        "render": function ( data, type, row, meta ) {
                            var str = data ? '<i class="fa fa-check"></i>' : '';
                            return str;
                        }
                    },
                    {
                    "targets": 7,
                    "data": 7,
                    "render": function ( data, type, row, meta ) {
                        var str = '<a href="/item/'+ data[0] +'" class="btn btn-info" target="_blank" title="Показать на сайте"><i class="fa fa-eye"></i></a>\n' +
                            '<a href="products/'+ data[1] +'/ru" class="btn btn-primary" target="_blank" title="Редактировать"><i class="fa fa-edit"></i></a>\n' +
                            '<a href="products/images/'+ data[1] +'" class="btn btn-success" target="_blank" title="Изображения"><i class="fa fa-picture-o"></i></a>';
                        return str;
                    }
                } ],
                "deferRender": true
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