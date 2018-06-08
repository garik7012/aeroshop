<div class="box-body table-responsive">
    <table id="adminSimpleDataTable" class="table table-hover table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Название (рус)</th>
            <th>Название (укр)</th>
            <th>Название (eng)</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->ru_title}}</td>
                <td>{{$item->uk_title}}</td>
                <td>{{$item->en_title}}</td>
                <td>
                    <button type="button" class="btn btn-primary changeItemModal" data-toggle="modal" data-target="#modal-default"
                            data-id="{{$item->id}}" data-ru="{{$item->ru_title}}" data-en="{{$item->en_title}}" data-uk="{{$item->uk_title}}">
                        Редактировать
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Редактировать названия</h4>
            </div>
            <form action="{{route('admin.params.update-item')}}" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputRuTitle">Название (рус)</label>
                        <input type="text" name="ru_title" value="" id="inputRuTitle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputUkTitle">Название (укр)</label>
                        <input type="text" name="uk_title" value="" id="inputUkTitle" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEnTitle">Название (eng)</label>
                        <input type="text" name="en_title" value="" id="inputEnTitle" class="form-control">
                    </div>
                    <input type="hidden" name="id" value="" class="inputItemId">
                    <input type="hidden" name="model" value="{{$model}}">
                    @csrf
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#adminSimpleDataTable').on('click', '.changeItemModal', function () {
                $('#inputRuTitle').val($(this).data('ru'));
                $('#inputEnTitle').val($(this).data('en'));
                $('#inputUkTitle').val($(this).data('uk'));
                $('input.inputItemId').val($(this).data('id'));
            });
        });
    </script>
@endpush