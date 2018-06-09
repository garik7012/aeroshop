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
                <p>Команда интернет магазина AeroShop предствавляет вашему вниманию нужные и полезные статьи по аэрографам и аэрографии. Эти статьи написаны на основании многолетнего опыта в сфере аэрографии</p><br>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-right">
                <div class="card text-center">
                    <img class="card-img-top" src="https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                    <div class="card-block">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text" data-match-height="featured">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                        <a class="btn btn-default" href="#">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up">
                <div class="card text-center">
                    <img class="card-img-top" src="https://images.pexels.com/photos/129105/pexels-photo-129105.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                    <div class="card-block">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text" data-match-height="featured">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, totam!</p>
                        <a class="btn btn-default" href="#">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-left">
                <div class="card text-center">
                    <img class="card-img-top" src="https://images.pexels.com/photos/129441/pexels-photo-129441.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                    <div class="card-block">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text" data-match-height="featured">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                        <a class="btn btn-default" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-aos="fade-left">
                <div class="card text-center">
                    <img class="card-img-top" src="https://images.pexels.com/photos/129441/pexels-photo-129441.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                    <div class="card-block">
                        <h4 class="card-title">Post Title</h4>
                        <p class="card-text" data-match-height="featured">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                        <a class="btn btn-default" href="#">Read More</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection