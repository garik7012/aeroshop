@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <a href="{{route('articles')}}"> @lang('g.articles')</a>
            <span>{{$article->title}}</span>
        </div>
    </div>
@endsection
@section('content')
    <div class="container articles__page">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h1>{{$article->title}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="image-container"><img src="{{asset($article->image)}}" alt="image"></div>
            <div class="article_contant">{!! $article->content !!}</div>
        </div>
    </div>
@endsection