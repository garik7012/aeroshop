@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Заказы</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
            ['name' => 'Categories', 'active' => true]
        ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Список заказов</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="adminSimpleDataTable" class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Номер</th>
                                <th>ФИО</th>
                                <th>Телефон</th>
                                <th>Email</th>
                                <th>Способ дост</th>
                                <th>Адрес дост</th>
                                <th>Подтвержд</th>
                                <th>Выполнен</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->delivery_option == 1 ? "по Киеву" : 'Новой почтой'}}</td>
                                    <td>{{$order->delivery}}</td>
                                    <td>@if($order->is_confirm)<i class="fa fa-check"></i>@endif</td>
                                    <td>@if($order->is_complete)<i class="fa fa-check"></i>@endif</td>
                                    <td>
                                        <a href="{{route('admin.orders.show', [$order->id])}}" class="btn btn-primary" title="show"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('admin.orders.delete')}}" class="btn btn-danger need-confirm" data-id='{{$order->id}}' data-item="order"><i class="fa fa-trash"></i></a>
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