@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Статьи</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Статьи', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список статей</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="adminProjectsTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Заголовок</th>
                                <th>Описание</th>
                                <th>Активна</th>
                                <th class="defaultSort">Создана</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->title}}</td>
                                    <td width="30%">{{$article->description}}</td>
                                    <td>{!! $article->is_active ? '<i class="fa fa-check"></i>' : '-' !!}</td>
                                    <td>{{$article->created_at->format('Y.m.d')}}</td>
                                    <td>
                                        <a href="{{route('admin.articles.edit', [$article->id])}}" class="btn btn-primary" title="show"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('article', [$article->id])}}" class="btn btn-info" title="show" target="_blank"><i class="fa fa-eye"></i></a>
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
        <a href="{{route('admin.articles.add')}}" class="btn btn-success">Добавить статью</a>
    </section>
    <!-- /.content -->
@endsection