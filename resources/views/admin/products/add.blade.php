@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Создать продукт</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Продукты', 'url' => route('admin.products.all')],
            ['name' => 'Редактирование товара', 'active' => true]
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
                        <h3 class="box-title">Общие параметры</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.products.store')}}" method="post">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('ru_title') ? ' has-error' : '' }}">
                                <label for="InputRuTitle">Заголовок (рус)</label>
                                <input type="text" name='ru_title' class="form-control" id="InputRuTitle" value="{{old('ru_title')}}">
                                @if ($errors->has('ru_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ru_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('uk_title') ? ' has-error' : '' }}">
                                <label for="InputUkTitle">Заголовок (укр)</label>
                                <input type="text" name='uk_title' class="form-control" id="InputUkTitle" value="{{old('uk_title')}}">
                                @if ($errors->has('uk_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uk_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('en_title') ? ' has-error' : '' }}">
                                <label for="InputEnTitle">Заголовок (eng)</label>
                                <input type="text" name='en_title' class="form-control" id="InputEnTitle" value="{{old('en_title')}}">
                                @if ($errors->has('en_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('en_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-4 {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label for="InputPrice">Цена</label>
                                    <input type="text" name='price' class="form-control" id="InputPrice" value="{{old('price')}}">
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-xs-4 {{ $errors->has('currency') ? ' has-error' : '' }}">
                                    <label for="SelectCurrency">Валюта</label>
                                    <select name="currency" class="form-control" id="SelectCurrency">
                                        @foreach(\App\Models\Cart::CURRENCIES as $currency)
                                            <option value="{{$currency}}" {{old('currency') == $currency ? 'selected' : ''}}>{{$currency}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('currency'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('currency') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-xs-4 {{ $errors->has('unit_id') ? ' has-error' : '' }}">
                                    <label for="SelectUnit">ед измерения</label>
                                    <select name="unit_id" class="form-control" id="SelectUnit">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{old('unit_id') == $unit->id ? 'selected' : ''}}>{{$unit->ru_title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('unit_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('unit_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('availability_id') ? ' has-error' : '' }}">
                                <label for="SelectCategory">Доступность</label>
                                <select name="availability_id" class="form-control" id="SelectCategory">
                                    @foreach(\App\Models\Availability::all() as $availability)
                                        <option value="{{$availability->id}}" {{old('availability_id') == $availability->id ? 'selected' : ''}}>{{$availability->ru_title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('availability_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('availability_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                                <label for="InputURL">Url товара(в адресной строке браузера)</label>
                                <input type="text" name='url' class="form-control" id="InputURL" value="{{old('url')}}">
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('youtube') ? ' has-error' : '' }}">
                                <label for="InputYoutube">Iframe ссылка youtube</label>
                                <input type="text" name="youtube" class="form-control" id="InputYoutube" value="{{old('youtube')}}">
                                @if ($errors->has('youtube'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="InputCode">Код товара</label>
                                <input type="text" name="code" class="form-control" id="InputCode" value="{{old('code')}}">
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="SelectCategory">Категория</label>
                                <select name="category_id" class="form-control" id="SelectCategory">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->ru_title}}
                                            {{$category->is_active ? '' : '(неактивна)'}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('brand_id') ? ' has-error' : '' }}">
                                <label for="SelectBrand">Производитель</label>
                                <select name="brand_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{old('brand_id') == $brand->id ? 'selected' : ''}}>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('brand_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }}">
                                <label for="SelectBrand">Страна производства</label>
                                <select name="country_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" {{old('country_id') == $country->id ? 'selected' : ''}}>{{$country->ru_title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="is_featured" value='0'>
                                    <input type="checkbox" name="is_featured" value='1' {{old('is_featured') ? 'checked' : ''}}>
                                    Показывать на главной как рекомендуемый</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1" {{old('is_active') ? 'checked' : ''}}>
                                    Отображать на сайте</label>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </div>
                            {{csrf_field()}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection