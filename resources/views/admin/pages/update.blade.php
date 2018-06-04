@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Страница: {{$page->url}}</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Страницы', 'url' => route('admin.pages.all')],
            ['name' => 'Редактирование страницы', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Выбрать язык редактирования страницы:
                            <a href="{{route('admin.pages.show', ['locale' => 'en', 'id' => $page->id])}}" class="btn btn-default {{app()->getLocale() == 'en' ? 'active': ''}}">English</a>
                            <a href="{{route('admin.pages.show', ['locale' => 'uk', 'id' => $page->id])}}" class="btn btn-default {{app()->getLocale() == 'uk' ? 'active': ''}}">Українська</a>
                            <a href="{{route('admin.pages.show', ['locale' => 'ru', 'id' => $page->id])}}" class="btn btn-default {{app()->getLocale() == 'ru' ? 'active': ''}}">Русский язык</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.pages.update', [$page->id])}}" method="post">
                        <input type="hidden" name="pageLocale" value="{{app()->getLocale()}}">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="InputTitle">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="InputTitle" value="{{$page->lang->title}}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="pageContent">Контент</label>
                                <textarea name="description" id="pageContent" rows="10" class="form-control turmbowyg">{{$page->lang->description}}</textarea>
                            </div>
                            <hr>
                            <h4>СЕО настройки страницы</h4>
                            <div class="form-group {{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                <label for="InputSeoTitle">Title</label>
                                <input type="text" name="seo_title" class="form-control" id="InputSeoTitle" value="{{$page->lang->seo_title}}">
                                @if ($errors->has('seo_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seo_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                <label for="InputSeoDescr">Description</label>
                                <input type="text" name="seo_description" class="form-control" id="InputSeoDescr" value="{{$page->lang->seo_description}}">
                                @if ($errors->has('seo_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seo_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <label for="InputKeyword">Keyword</label>
                                <input type="text" name="keywords" class="form-control" id="InputKeyword" value="{{$page->lang->keywords}}">
                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{route('admin.pages.all')}}" class="btn btn-default">Назад к списку</a>
                            <button type="submit" class="btn btn-primary">Принять</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection