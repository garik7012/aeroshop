@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Прайс лист YML</h1>
        @include('admin._partials.breadcrumbs', $breadcrumbs = [
           ['name' => 'Прайс', 'active' => true]
       ])
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <h2>Ссылка на файл:</h2>
        <a href="{{url($pricePath)}}" target="_blank">{{url($pricePath)}}</a>
        <h3>Обновить файл прайса (может длится долго)</h3>
        <form action="{{route('admin.price.generate')}}" method="post">
            @csrf
            <input type="submit" class="btn btn-default" value="Сгенерировать">
        </form>
    </section>
    <!-- /.content -->
@endsection