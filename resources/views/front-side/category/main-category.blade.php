@extends('layouts.main')
@section('title', $category->lang->seo_title)
@section('keywords', $category->lang->keywords)
@section('description', $category->lang->seo_description)
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
            <img src="{{$category->image}}" class="img-responsive" alt="" width="1040" height="400">
            <div class="cat_desc">
                <div class="catDescContent">
                    {{$category->lang->description}}
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
                        <img src="{{$categ->preview}}" class="img-responsive" alt="{{$categ[_lt()]}}">
                    </div>
                    <span>{{$categ[_lt()]}}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection