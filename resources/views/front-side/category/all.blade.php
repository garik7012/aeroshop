@extends('layouts.main')
@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span>@lang('g.categories')</span>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-col left_column col-sm-12 allCategories">
        <ul class="product-categories">
            @foreach($categories->where('parent_id', 0) as $category)
                @if ($category->old_number === null)
                    <li class="">
                        <a href="{{route('category', $category->id)}}">{{$category[_lt()]}}</a>
                        <ul class="sub-categories">
                            @foreach($categories->where('parent_id', $category->id) as $child)
                                <li>
                                    <a href="{{route('category', $child->id)}}">{{$child[_lt()]}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
            @foreach($categories->where('parent_id', 0) as $category)
                @if ($category->old_number)
                    <li class="">
                        <a href="{{route('category', $category->id)}}">{{$category[_lt()]}}</a>
                    </li>
                @endif
            @endforeach
            <div class="clearfix"></div>
        </ul>
    </div>
@endsection