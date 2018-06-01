@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb">  <a class="home" href="{{route('index')}}"></a>
            <span>@lang('cart.success.bread')</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="centerColumn m-b-100" id="checkoutSuccess">
        <div class="heading"><h1>@lang('cart.success.title')</h1></div>
        <div id="checkoutSuccessOrderNumber"><strong>@lang('cart.success.number'):</strong> {{$id}}</div>
        <div id="checkoutSuccessMainContent" class="content">
            <p><strong>@lang('cart.success.dTitle')</strong></p>
            <p>@lang('cart.success.descr') </p>
        </div>
        <div id="checkoutSuccessContactLink">@lang('cart.success.questions') <a href="#" name="linkContactUs">@lang('cart.success.customer')</a>.</div>
        <h3 id="checkoutSuccessThanks" class="centeredContent">@lang('cart.success.thanks')</h3>
    </div>
@endsection