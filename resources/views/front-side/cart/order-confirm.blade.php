@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"> <a class="home" href="{{route('index')}}"></a>
            <a href="{{route('checkout')}}">@lang('cart.order.checkout')</a>
            <span> @lang('cart.order.Confirmation')</span>
        </div>
    </div>
@endsection

@section('content')
<div class="centerColumn" id="checkoutConfirmDefault">
    <div class="heading"><h1>@lang('cart.order.conf-title')</h1></div>
    <div id="checkoutShipto">
        <h2 id="checkoutConfirmDefaultShippingAddress">@lang('cart.order.dsTitle')</h2>
        <div class="buttonRow forward"><a class="btn btn-success" href="{{route('checkout')}}"><span class="cssButton normal_button button  small_edit" onmouseover="this.className='cssButtonHover normal_button button  small_edit small_editHover'" onmouseout="this.className='cssButton normal_button button  small_edit'">&nbsp;{{__('g.edit')}}&nbsp;</span></a></div>
        <br><br>
        <address>
            <p><strong>@lang('cart.order.name'):</strong> {{$order->name}}</p>
            <p><strong>@lang('cart.order.email'):</strong> {{$order->email}}</p>
            <p><strong>@lang('cart.order.phone'):</strong> {{$order->phone}}</p>
            <p><strong>@lang('cart.order.address'):</strong> {{$order->delivery}}</p>
        </address>
        <h3 id="checkoutConfirmDefaultShipment">@lang('cart.order.sMethod'):</h3>
        <h4 id="checkoutConfirmDefaultShipmentTitle">{{$order->delivery_option == 2 ? __('cart.order.nova') : __('cart.order.courier')}}</h4>
    </div>
    @if ($order->without_call)
    <h3 id="checkoutConfirmDefaultHeadingComments">@lang('cart.order.special')</h3>
    <div>@lang('cart.order.without-call')</div>
    <hr>
    @endif
    <h3 id="checkoutConfirmDefaultHeadingCart">@lang('cart.title')</h3>
    <div class="buttonRow forward">
        <a class="btn btn-success" href="{{route('show-cart')}}">
            <span class="cssButton normal_button button  small_edit">&nbsp;@lang('g.edit')&nbsp;</span>
        </a>
    </div>
    <br>
    <table class="table table-bordered" width="100%" cellspacing="0" cellpadding="0" id="cartContentsDisplay">
        <thead>
        <tr class="cartTableHeading">
            <th scope="col" id="ccQuantityHeading" width="30">@lang('g.quantity')</th>
            <th scope="col" id="ccProductsHeading">@lang('cart.itemName')</th>
            <th scope="col" id="ccTotalHeading">@lang('cart.total')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->products as $product)
            @php($total[$product->currency] += $product->price * $product->quantity)
        <tr>
            <td class="cartQuantity">{{$product->quantity}}&nbsp;x</td>
            <td class="cartProductDisplay">{{$product->getProduct[_lt()]}}</td>
            <td class="cartTotalDisplay">{{$product->price * $product->quantity}} {{$product->currency}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    <div id="orderTotals">
        <div id="ottotal">
            <div class="totalBox larger forward">@foreach($total as $currency => $cTotal) @if ($cTotal == 0) @continue @endif
            {{$cTotal}} {{$currency}}<br>
            @endforeach
            </div>
            <div class="lineTitle larger forward">@lang('cart.total'):</div>
        </div>
    </div>
    <form role="form" name="checkout_confirmation" action="{{route('confirm-order')}}" method="post" id="checkout_confirmation" onsubmit="submitonce();">
        @csrf
        <div class="buttonRow forward pull-right"><input type="submit" class="btn btn-success add-to-cart" value="@lang('cart.order.confirm')"></div>
    </form>
</div>
<div class="clearfix m-b-100"></div>
@endsection