@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('cart.bread')</span>
        </div>
    </div>
@endsection

@section('content')
<div class="centerColumn" id="shoppingCartDefault">
    <div class="heading"><h1>@lang('cart.title')</h1></div>
    <div class="tie text2">
        <div class="tie-indent">
            @if(session('cart') and session('cart')->items)
            <form role="form" name="cart_quantity" action="{{route('cart-update')}}" method="post">
                @csrf
                <div class="cartTotalsDisplay important">Total Items: {{session('cart')->totalQty}}</div>
                <table class="table table-bordered" border="0" width="100%" cellspacing="0" cellpadding="0" id="cartContentsDisplay">
                    <tbody>
                    <tr class="tableHeading">
                        <th scope="col" id="scProductImg"></th>
                        <th scope="col" id="scProductsHeading">@lang('cart.itemName')</th>
                        <th scope="col" id="scUnitHeading">@lang('cart.unit')</th>
                        <th scope="col" id="scQuantityHeading">@lang('g.quantity')</th>
                        <th scope="col" id="scTotalHeading">@lang('cart.total')</th>
                        <th scope="col" id="scRemoveHeading">@lang('g.delete')</th>
                    </tr>
                        <!-- Loop through all products /-->
                    @foreach(session('cart')->items as $item)
                    <tr class="">
                        <td class="cartProductDisplay">
                            <a href="{{route('product', $item['product']->url)}}">
                                <span id="cartImage">
                                    <img src="{{productImg($item['product'])}}"
                                                          class="img-responsive"
                                                          alt="{{$item['product'][_lt()]}}"
                                                          width="150" height="150">
                                </span>
                            </a>
                        </td>
                        <td class="cartProductDisplay">
                            <a href="{{route('product', $item['product']->url)}}">
                                <span id="cartProdTitle" class="heading">{{$item['product'][_lt()]}}</span>
                            </a>
                        </td>
                        <td class="cartUnitDisplay price" data-title="Unit price">{{$item['product']->price}} {{$item['product']->currency}}</td>
                        <td class="cartQuantity">
                            <input type="text" name="cart_quantity[{{$item['product']->id}}]" value="{{$item['qty']}}" size="4">
                        </td>
                        <td class="cartTotalDisplay" data-title="Total">{{$item['product']->price * $item['qty']}} {{$item['product']->currency}}</td>
                        <td class="cartRemoveItemDisplay">
                            <input type="checkbox" name="cart_delete[{{$item['product']->id}}]">
                        </td>
                    </tr>
                    @endforeach
                    <!-- Finished loop through all products /-->

                    </tbody>
                </table>
                <button class="btn" type="submit"><i class="fa fa-refresh"></i> @lang('cart.refresh')</button>
            </form>
        </div>
    </div>
    <div id="cartSubTotal"><b>Sub-Total:</b>&nbsp;&nbsp;<span class="price">
            @foreach(session('cart')->totalPrice as $currency => $total){{$total ? $total . $currency . '; ': ''}}
            @endforeach
        </span>
    </div>
    <!--bof shopping cart buttons-->
    <div class="wrapper">
        <div class="shcart_btn">
            <div class="btn cont_shop">
                <a href="{{route('index')}}"><span class="cssButton normal_button button  button_continue_shopping"
                            onmouseover="this.className='cssButtonHover normal_button button  button_continue_shopping button_continue_shoppingHover'"
                            onmouseout="this.className='cssButton normal_button button  button_continue_shopping'">&nbsp;@lang('cart.continue')</span>
                </a>
            </div>
            <a class="btn" href="{{route('checkout')}}"><span class="cssButton normal_button button  button_checkout"
                        onmouseover="this.className='cssButtonHover normal_button button  button_checkout button_checkoutHover'"
                        onmouseout="this.className='cssButton normal_button button  button_checkout'">&nbsp;@lang('g.checkout')&nbsp;</span>
            </a>
        </div>
    </div>
    @else
        <h2>@lang('cart.empty')</h2>
        <a href="{{route('index')}}" class="btn">@lang('cart.continue')</a>
    @endif
</div>
<div class="clearfix m-b-100"></div>
@endsection