@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('cart.order.checkout')</span>
        </div>
    </div>
@endsection

@section('content')
<div class="centerColumn" id="loginDefault">
    <div class="heading"><h1>@lang('cart.order.title')</h1></div>
    <div class="tie">
        <div class="tie-indent">
            <form role="form" name="create_account" action="{{route('order.store')}}" method="post">
                @csrf
                <fieldset class="company">
                    <legend>@lang('cart.order.uDetails')</legend>
                </fieldset>
                <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                    <label class="inputLabel" for="name">@lang('cart.order.name')</label>
                    <input type="text" name="name" size="41" maxlength="64" id="name" class="form-control" value="{{$order->name ?: old('name')}}">
                    @if ($errors->has('name')) <span class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></span>@endif
                </div>
                <div class="form-group {{$errors->has('phone') ? ' has-error' : ''}}">
                    <label class="inputLabel" for="telephone">@lang('cart.order.phone'): <small>*</small></label>
                    <input type="text" name="phone" size="33" maxlength="32" id="telephone" value="{{$order->phone ?: old('phone')}}" class="form-control">
                    @if ($errors->has('phone')) <span class="help-block text-danger"><strong>{{ $errors->first('phone') }}</strong></span>@endif
                </div>
                <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
                    <label class="inputLabel" for="email-address">@lang('cart.order.email'):
                        <small>*</small>
                    </label>
                    <input type="text" name="email" size="41" maxlength="96" value="{{$order->email ?: old('email')}}" id="email-address" class="form-control">
                    @if ($errors->has('email')) <span class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></span>@endif
                </div>
                <fieldset class="address">
                    <legend>@lang('cart.order.addressDetails')</legend>
                </fieldset>
                <div class="form-group {{$errors->has('delivery_option') ? ' has-error' : ''}}">
                    <label for="deliveryOption" class="inputLabel"></label>
                    <select class="form-control" name="delivery_option" id="deliveryOption">
                        <option value="1">@lang('cart.order.courier')</option>
                        <option value="2" {{$order->delivery_option == 2 || old('delivery_option') == 2 ? 'selected' : ''}}>@lang('cart.order.nova')</option>
                    </select>
                    @if ($errors->has('delivery_option')) <span class="help-block text-danger"><strong>{{ $errors->first('delivery_option') }}</strong></span>@endif
                </div>
                <div class="form-group {{$errors->has('delivery') ? ' has-error' : ''}}">
                    <label class="inputLabel" for="street-address">@lang('cart.order.address'):
                        <small>*</small>
                    </label>
                    <textarea name="delivery" id="street-address" class="form-control" rows="6">{{$order->delivery ?: old('delivery')}}</textarea>
                    @if ($errors->has('delivery')) <span class="help-block text-danger"><strong>{{ $errors->first('delivery') }}</strong></span>@endif
                </div>
                <div class="form-group">
                    <div>
                        <input type="hidden" name="without_call" value="0">
                        <input type="checkbox" name="without_call" value="1" id="newsletter-checkbox" {{$order->without_call ? 'checked' : ''}}>
                        <label class="checkboxLabel" for="newsletter-checkbox">@lang('cart.order.without-call')</label>
                    </div>
                </div>
                <div class="buttonRow">
                    <input type="submit" class="btn btn-success add-to-cart" value="@lang('g.next')">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix m-b-100"></div>
@endsection