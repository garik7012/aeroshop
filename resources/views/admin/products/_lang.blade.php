<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Контент. СЕО настройки. Для языка:
                    <a href="{{route('admin.products.show', ['locale' => 'en', 'id' => $product->id])}}" class="btn btn-default {{app()->getLocale() == 'en' ? 'active': ''}}">English</a>
                    <a href="{{route('admin.products.show', ['locale' => 'uk', 'id' => $product->id])}}" class="btn btn-default {{app()->getLocale() == 'uk' ? 'active': ''}}">Українська</a>
                    <a href="{{route('admin.products.show', ['locale' => 'ru', 'id' => $product->id])}}" class="btn btn-default {{app()->getLocale() == 'ru' ? 'active': ''}}">Русский язык</a>
                </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{route('admin.products.update-lang', [$product->id, $locale])}}" method="post">
                <input type="hidden" name="productLocale" value="{{app()->getLocale()}}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="productContent">Контент</label>
                        <textarea name="description" id="productContent" rows="10" class="form-control turmbowyg">{{$product->lang->description}}</textarea>
                    </div>
                    <hr>
                    <h4>СЕО настройки страницы</h4>
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="InputSeoTitle">Title</label>
                        <input type="text" name="title" class="form-control" id="InputSeoTitle" value="{{$product->lang->title}}">
                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('seo_description') ? ' has-error' : '' }}">
                        <label for="InputSeoDescr">Description</label>
                        <input type="text" name="seo_description" class="form-control" id="InputSeoDescr" value="{{$product->lang->seo_description}}">
                        @if ($errors->has('seo_description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('seo_description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('keywords') ? ' has-error' : '' }}">
                        <label for="InputKeyword">Keywords</label>
                        <input type="text" name="keywords" class="form-control" id="InputKeyword" value="{{$product->lang->keywords}}">
                        @if ($errors->has('keywords'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{route('admin.products.all')}}" class="btn btn-default">Назад к списку</a>
                    <button type="submit" class="btn btn-primary">Принять</button>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>