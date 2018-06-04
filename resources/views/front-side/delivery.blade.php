@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('site.menu.shipping')</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="content m-b-100">
        <h1 class="centerBoxHeading">{{$page->lang->title}}</h1>
        {!! $page->lang->description !!}
    </div>
@endsection