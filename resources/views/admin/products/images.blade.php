@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Изображения продукта:</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Продукты', 'url' => route('admin.products.all')],
            ['name' => 'Редактирование изображений продукта', 'active' => true]
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
                        <h3 class="box-title">{{$product->ru_title}}</h3>
                    </div>
                    <div class="box-body">
                        @foreach($product->images as $image)
                            <div class="row" style="padding: 0 10px;">
                                <div class="" style="background: #eee; padding: 5px; margin-bottom: 5px">
                                    <div class="media-left">
                                        <a href="{{asset($image->url)}}" target="_blank">
                                            <img src="{{asset($image->url)}}" alt="" style="max-width: 500px">
                                        </a>
                                    </div>
                                    <div class="media-body" style="vertical-align: middle">
                                        @if($image->is_main)
                                        <h3>Это главное изображение</h3>
                                        @else
                                        <a href="{{route('admin.products.image-main', ['product_id' => $product->id, 'image_id' => $image->id])}}" class="btn btn-default">Сделать это изображение главным</a>
                                        <p></p>
                                        <a href="{{route('admin.products.image-delete', ['product_id' => $product->id])}}" class="btn btn-danger need-confirm" data-id="{{$image->id}}" data-item="изображение"><i class="fa fa-trash"></i> Удалить</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="box-footer">
                        <form action="{{route('admin.products.add-image', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputFile">Добавить изображение</label>
                                <input type="file" name="image" id="exampleInputFile">
                                <p class="help-block">jpg, png, jpeg, gif</p>
                                <input type="submit" class="btn btn-success" value="Добавить изображение">
                            </div>
                        </form>
                        <a href="{{route('admin.products.all')}}" class="btn btn-default">Назад к товарам</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection