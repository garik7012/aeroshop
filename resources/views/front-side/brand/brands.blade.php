@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('g.Manufacturers')</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="centerColumn categoryColumn" id="indexCategories">
        <h1 class="centerBoxHeading">@lang('g.Manufacturers')</h1>
        <div id="productListing">
            <div class="clearfix"></div>
            <div class="tie tie-margin1">
                <div class="tie-indent">
                    <ul class="brand_list row">
                        @foreach($brands as $brand)
                            <li><a href="{{route('brand-products', $brand->id)}}">{{$brand->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection