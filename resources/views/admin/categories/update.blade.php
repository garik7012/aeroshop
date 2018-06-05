@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Категория: {{$category[_lt()]}}</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Категории', 'url' => route('admin.categories.all')],
            ['name' => 'Редактирование категории', 'active' => true]
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
                        <h3 class="box-title">Общие настройки категории</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="{{route('admin.categories.update', [$category->id])}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('ru_title') ? ' has-error' : '' }}">
                                <label for="InputTitleRu">Заголовок (руc)</label>
                                <input type="text" name="ru_title" class="form-control" id="InputTitleRu" value="{{old('ru_title') ?: $category->ru_title}}">
                                @if ($errors->has('ru_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ru_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('en_title') ? ' has-error' : '' }}">
                                <label for="InputTitleEn">Заголовок (en)</label>
                                <input type="text" name="en_title" class="form-control" id="InputTitleEn" value="{{old('en_title') ?: $category->en_title}}">
                                @if ($errors->has('en_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('en_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('uk_title') ? ' has-error' : '' }}">
                                <label for="InputTitleUk">Заголовок (укр)</label>
                                <input type="text" name="uk_title" class="form-control" id="InputTitleUk" value="{{old('uk_title') ?: $category->uk_title}}">
                                @if ($errors->has('uk_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uk_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            @if ($category->old_number > 0)
                                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="InputParent">Родительская категория</label>
                                    <select name="parent_id" class="form-control" id="InputParent">
                                        <option value="0">Без родительской категории</option>
                                        @foreach($parentCategories as $id => $title)
                                            <option value="{{$id}}" {{$category->parent_id == $id ? 'selected': ''}}>{{$title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            @endif
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" id="InputTitle"
                                           value="1" {{$category->is_active ? 'checked' : ''}}>
                                    Показывать на сайте</label>
                            </div>
                            <h4>Изображения категории</h4>
                            <hr>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <a href="{{$category->image}}" target="_blank"><img src="{{$category->image}}" alt="" width="400"></a>
                                <label for="exampleInputFile">Большое изображение при открытии категории
                                    <input type="file" id="exampleInputFile" name="image" class="form-control-file">
                                    jpeg, png, bmp, gif или svg
                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                    </label>
                            </div>
                            @if ($category->parent_id)
                                <hr>
                            <div class="form-group{{ $errors->has('preview') ? ' has-error' : '' }}">
                                <img src="{{$category->preview}}" alt="" width="200">
                                <label for="exampleInputFile">Превью на странице главной категории
                                    <input type="file" id="exampleInputFile" name="preview" class="form-control-file">
                                    jpeg, png, bmp, gif или svg
                                    @if ($errors->has('preview'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('preview') }}</strong>
                                    </span>
                                    @endif
                                </label>
                            </div>
                            @endif
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
                <div class="box box-primary">
                    <form action="{{route('admin.categories.update-lang', ['id' => $category->id, 'locale' => app()->getLocale()])}}" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Выбрать язык редактирования:
                                <a href="{{route('admin.categories.show', ['locale' => 'en', 'id' => $category->id])}}"
                                   class="btn btn-default {{app()->getLocale() == 'en' ? 'active': ''}}">English</a>
                                <a href="{{route('admin.categories.show', ['locale' => 'uk', 'id' => $category->id])}}"
                                   class="btn btn-default {{app()->getLocale() == 'uk' ? 'active': ''}}">Українська</a>
                                <a href="{{route('admin.categories.show', ['locale' => 'ru', 'id' => $category->id])}}"
                                   class="btn btn-default {{app()->getLocale() == 'ru' ? 'active': ''}}">Русский язык</a>
                            </h3>
                        </div>
                        <div class="box-body">
                            <h4></h4>
                            <div class="form-group">
                                <label for="pageContent">Контент</label>
                                <textarea name="description" id="pageContent" rows="10"
                                          class="form-control turmbowyg">{{$category->lang->description}}</textarea>
                            </div>
                            <h4>СЕО</h4>
                            <hr>
                            <div class="form-group {{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                <label for="InputSeoTitle">Title</label>
                                <input type="text" name="seo_title" class="form-control" id="InputSeoTitle"
                                       value="{{$category->lang->seo_title}}">
                                @if ($errors->has('seo_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seo_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                <label for="InputSeoDescr">Description</label>
                                <input type="text" name="seo_description" class="form-control" id="InputSeoDescr"
                                       value="{{$category->lang->seo_description}}">
                                @if ($errors->has('seo_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('seo_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                                <label for="InputKeyword">Keyword</label>
                                <input type="text" name="keywords" class="form-control" id="InputKeyword"
                                       value="{{$category->lang->keywords}}">
                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{route('admin.categories.all')}}" class="btn btn-default">Назад к списку</a>
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