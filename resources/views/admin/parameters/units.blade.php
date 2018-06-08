@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Единицы измерения</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Доп параметры', 'active' => false],
           ['name' => 'Единицы измерения', 'active' => true]
       ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Таблица</h3>
                    </div>
                    <!-- /.box-header -->
                @include('admin.parameters._table', ['items' => $units, 'model' => 'Unit'])
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <form action="{{route('admin.params.add-item')}}" method="post">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" name="ru_title" class="form-control" placeholder="Название (рус)" required>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="uk_title" class="form-control" placeholder="Название (укр)" required>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="en_title" class="form-control" placeholder="Название (eng)" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <p></p>
                                <input type="hidden" name="model" value="Unit">
                                <input type="submit" class="btn btn-success" value="Добавить параметр">
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
@endsection