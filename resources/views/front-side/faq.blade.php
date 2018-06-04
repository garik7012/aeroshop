@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> FAQ</span>
        </div>
    </div>
@endsection

@section('content')
<div id="gvFaqDefaultMainContent" class="content m-b-100">
    <h1 class="centerBoxHeading">{{$page->lang->title}}</h1>
    <h3>Какой оптимальный набор инструментов необходим для занятий аэрографией?</h3>
    <div>Для занятий любым видом аэрографии Вам необходимо: <strong>
            <a href="{{route('category', 19)}}" target="_self">АЭРОГРАФ</a>,
            <a href="{{route('category', 20)}}" target="_self">КОМПРЕССОР СО ШЛАНГОМ</a> И
            <a href="{{route('category', 23)}}" target="_self">КРАСКИ</a>.</strong>
    </div>
    {!! $page->lang->description !!}
</div>
@endsection