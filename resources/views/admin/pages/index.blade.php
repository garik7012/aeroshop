@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Страницы</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Страницы', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список страниц</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="adminSimpleDataTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Адрес страницы</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{$page->url}}</td>
                                    <td>
                                        <a href="/{{$page->url}}" class="btn btn-info" title="show"><i class="fa fa-eye"></i> вид на сайте</a>
                                        <a href="{{route('admin.pages.show', ['id' => $page->id, 'locale' => 'ru'])}}" class="btn btn-primary" title="edit"><i class="fa fa-edit"></i> редактировать</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection