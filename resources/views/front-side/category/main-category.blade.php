@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <a href="{{route('all-categories')}}">@lang('g.categories')</a>
            <span> {{$category[_lt()]}}</span>
        </div>
    </div>
@endsection

@section('content')
<div class="centerColumn categoryColumn" id="indexCategories">
    <h1 class="centerBoxHeading">{{$category[_lt()]}}</h1>
    <div class="content_scene_cat_bg">
        <div id="category-image" class="categoryImg">
            <img src="/img/cat/big/{{$category->id}}.jpg" class="img-responsive" alt="" width="1040" height="400">
            <div class="cat_desc">
                <div class="catDescContent">
                    The supplies we sell in our store are of premium quality and will serve you for years. We enrich our Plumbing Supplies Store only with the well tested models which have won trust and are known thanks to their resistance to depreciation. Modern and reliable they will cause you no troubles in further exploitation. Trust our plumbing experience and we will justify it.
                </div>
            </div>
        </div>
    </div>
    <div id="subcategories">
        <p class="subcategory-heading">@lang('g.Subcategories')</p>
        <ul class="row">
            @foreach($categories->where('parent_id', $category->id) as $categ)
            <li class="categoryListBoxContents col-md-3 col-sm-6 col-xs-12">
                <a href="{{route('category', $categ->id)}}">
                    <div data-match-height="catRow" class="subcategory-image " style="height: 116px;">
                        <img src="/img/cat/small/{{$categ->old_number}}.jpg" class="img-responsive" alt="{{$categ[_lt()]}}">
                    </div>
                    <span>{{$categ[_lt()]}}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection