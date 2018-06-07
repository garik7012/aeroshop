@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Продукты</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Продукты', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список продуктов</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="asyncProductTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Наименование</th>
                                <th>
                                    <select id="categoryFilterSelect" style="width: 150px" onclick="event.stopPropagation()">
                                        <option value="">Категория (все)</option>
                                        @foreach($categories->where('old_number', '>', 0) as $category)
                                        <option value="{{$category->ru_title}}">{{$category->ru_title}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select id="brandFilterSelect" style="width: 80px" onclick="event.stopPropagation()">
                                        <option value="">Brands (все)</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand}}">{{$brand}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>
                                    <select id="avaiabilityFilterSelect" style="width: 70px" onclick="event.stopPropagation()">
                                        <option value="">Наличие:</option>
                                        @foreach($availabilities as $availability)
                                            <option value="{{$availability->ru_title}}">{{$availability->ru_title}}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th>Рек.</th>
                                <th>Акт.</th>
                                <th width="120">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->ru_title}}</td>
                                    <td>{{$product->category->ru_title}}</td>
                                    <td>{{$product->brand ? $product->brand->title : ''}}</td>
                                    <td>{{$product->availability->ru_title}}</td>
                                    <td>{!! $product->is_featured ? '<i class="fa fa-check"></i>' : ''!!}</td>
                                    <td>{!! $product->is_active ? '<i class="fa fa-check"></i>' : ''!!}</td>
                                    <td>
                                        <a href="/item/{{$product->url}}" class="btn btn-info" target="_blank" title="Показать на сайте"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.products.show', ['id' => $product->id, 'locale' => 'ru'])}}" class="btn btn-primary" title="Редактировать"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('admin.products.images', $product->id)}}" class="btn btn-success" title="Изображения"><i class="fa fa-picture-o"></i></a>
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
@push('scripts')
    <script>
        $(document).ready(function () {
            app.Product.initDataTable();
        });
    </script>
@endpush