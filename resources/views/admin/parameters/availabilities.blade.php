@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Наличие товара</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Доп параметры', 'active' => false],
           ['name' => 'Доступность', 'active' => true]
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
                    <div class="box-body table-responsive">
                        <table id="adminSimpleDataTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название (рус)</th>
                                <th>Название (укр)</th>
                                <th>Название (eng)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($availabilities as $availability)
                                <tr>
                                    <td>{{$availability->id}}</td>
                                    <td>{{$availability->ru_title}}</td>
                                    <td>{{$availability->uk_title}}</td>
                                    <td>{{$availability->en_title}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                                <input type="hidden" name="model" value="Availability">
                                <input type="submit" class="btn btn-success" value="Добавить">
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