@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <a href="{{route('brands')}}">@lang('g.Manufacturers')</a>
            <span> {{$brand->title}}</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="centerColumn categoryColumn" id="indexCategories">
        <h1 class="centerBoxHeading">{{$brand->title}}</h1>
        @include('layouts._partials.product-list')
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('js/list-greed.js') }}"></script>
@endpush