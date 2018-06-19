@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Добавить статью</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Статьи', 'url' => route('admin.articles.all')],
            ['name' => 'Добавить статью', 'active' => true]
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
                        <h3 class="box-title">Создать статью</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.articles.create')}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="InputName">Заголовок статьи</label>
                                <input type="text" name="title" class="form-control" id="InputName" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="InputDescription">Краткое описание (в превью)</label>
                                <input type="text" name="description" class="form-control" id="InputDescription" value="{{old('description')}}">
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="exampleInputFile">Заглавное изображение статьи
                                    <input type="file" id="exampleInputFile" name="image" class="form-control-file">

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </label>
                                <span>jpeg, png, bmp, gif или svg</span>
                            </div>
                            <div class="form-group">
                                <label for="pageContent">Статья</label>
                                <textarea name="content" id="pageContent" rows="10"
                                          class="form-control turmbowyg">{{old('content')}}</textarea>
                            </div>
                            <h4>СЕО</h4>
                            <div class="form-group {{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                <label for="InputDescription">СЕО description (описание в гугле)</label>
                                <input type="text" name="seo_description" class="form-control" id="InputDescription" value="{{old('seo_description')}}">
                                @if ($errors->has('seo_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seo_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <label for="InputDescription">СЕО keywords (ключевые слова)</label>
                                <input type="text" name="keywords" class="form-control" id="InputDescription" value="{{old('keywords')}}">
                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox {{ $errors->has('is_active') ? ' has-error' : '' }}">
                                <label>
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" class="" id="InputIsActive" value="1" {{old('is_active') ? 'checked': ''}}>
                                    Показывать статью на сайте</label>
                                @if ($errors->has('is_active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <a href="{{route('admin.articles.all')}}" class="btn btn-default">Назад к списку статей</a>
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