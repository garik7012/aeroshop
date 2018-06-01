@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <a href="{{route('all-categories')}}">@lang('g.categories')</a>
            @if ($category->parent_id)
                <a href="{{route('category', $category->parent_id)}}">{{$categories->where('id', $category->parent_id)->first()[_lt()]}}</a>
            @endif
            <span> {{$category[_lt()]}}</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="centerColumn categoryColumn" id="indexCategories">
        <h1 class="centerBoxHeading">{{$category[_lt()]}}</h1>
        <div class="content_scene_cat_bg">
            <div id="category-image" class="categoryImg">
                <img src="/img/cat/big/{{$category->old_number}}.jpg" class="img-responsive" alt="">
            </div>
        </div>
        @include('layouts._partials.product-list')
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('js/list-greed.js') }}"></script>
@endpush