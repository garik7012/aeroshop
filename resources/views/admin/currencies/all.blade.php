@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Параметры</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Доп параметры', 'active' => false],
           ['name' => 'Параметры товара', 'active' => true]
       ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список параметров</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="adminSimpleDataTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Международный код валюты</th>
                                <th>Курс к гривне</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($currencies as $currency)
                                <tr>
                                    <td>{{$currency->code}}</td>
                                    <td>{{$currency->rate}}</td>
                                    <td>@if ($currency->code != 'UAH')
                                        <button type="button" class="btn btn-primary changeRateModal" data-toggle="modal" data-target="#modal-default" data-code="{{$currency->code}}" data-rate="{{$currency->rate}}">
                                            Редактировать курс
                                        </button>@endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <form action="{{route('admin.currencies.add')}}" method="post">
                            <div class="row">
                                <div class="col-xs-4">
                                    <select name="code" required class="form-control">
                                        <option value="">Валюты для добавления</option>
                                        <option value="CHF">CHF	(Швейцарский франк)</option>
                                        <option value="CNY">CNY	(Китайский юань женьминьби)</option>
                                        <option value="RUB">RUB	(Российский рубль)</option>
                                    </select>
                                    @if ($errors->has('code')) <strong class="text-danger">{{ $errors->first('code') }}</strong> @endif
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" name="rate" placeholder="0,00" required>
                                    @if ($errors->has('rate')) <strong>{{ $errors->first('rate') }}</strong> @endif
                                </div>
                                <div class="col-xs-4">
                                    @csrf
                                    <input type="submit" class="btn btn-success" value="Добавить валюту">
                                </div>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
    <!-- modal -->
    <div class="modal fade" id="modal-default" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Установить новый курс <span class="changedCurrency"></span></h4>
                </div>
                <form action="{{route('admin.currencies.change')}}" method="post">
                <div class="modal-body">
                    <input type="text" name="rate" value="" class="form-control rateInput">
                    <input type="hidden" name="code" value="">
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
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('.changeRateModal').click(function () {
                $('input.rateInput').val($(this).data('rate'));
                $('.changedCurrency').text($(this).data('code'));
                $('input[name=code]').val($(this).data('code'));
            });
        });
    </script>
@endpush
