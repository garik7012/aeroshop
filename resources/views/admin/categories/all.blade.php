@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Категории</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Категории', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список категорий</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="adminSimpleDataTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Название(на русском)</th>
                                <th>Главн.</th>
                                <th>Родительская категория</th>
                                <th>Акт.</th>
                                <th width="80">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->ru_title}}</td>
                                    <td>{!! $category->old_number ? '-': '<i class="fa fa-check"></i>'!!}</td>
                                    <td>{{ $category->parent_id > 0 ? $parentCategory[$category->parent_id] : '-'}}</td>
                                    <td>{!! $category->is_active ? '<i class="fa fa-check"></i>': '-'!!}</td>
                                    <td>
                                        <a href="/category/{{$category->id}}" class="btn btn-info" title="show"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.categories.show', ['id' => $category->id, 'locale' => 'ru'])}}" class="btn btn-primary" title="редактировать"><i class="fa fa-edit"></i></a>
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