@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('g.articles')</span>
        </div>
    </div>
@endsection
@section('content')
    <div class="container articles__page">

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <h1>{{$page->lang->title}}</h1>
                <p>{{$page->lang->description ?: 'Команда интернет магазина AeroShop предствавляет вашему вниманию нужные и полезные статьи по аэрографам и аэрографии. Эти статьи написаны на основании многолетнего опыта в сфере аэрографии'}}</p><br>
            </div>
        </div>

        <div class="row">
            @php($aos = ['fade-right', 'fade-up', 'fade-left'])
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="{{$aos[$loop->index%3]}}">
                <div class="card text-center">
                    <img class="card-img-top" src="{{asset($article->image)}}" alt="" width="100%">
                    <div class="card-block">
                        <h4 class="card-title">{{$article->title}}</h4>
                        <p class="card-text" data-match-height="featured">{{$article->description}}</p>
                        <a class="btn btn-default" href="/article/{{$article->id}}">@lang('Read More')</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection