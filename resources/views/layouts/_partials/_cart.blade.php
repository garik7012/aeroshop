<div class="shopping_cart" id="shopping_cart">
    <div class="shop-box-wrap">
        <span class="cart_title">@lang('g.Cart')</span>
        <span class="st3">{{session('cart') && session('cart')->totalQty ? session('cart')->totalQty : __('g.empty')}} </span>
    </div>
    @if(session('cart') and session('cart')->totalQty)
    <div class="shopping_cart_content" id="shopping_cart_content" style="overflow: hidden; display: none;">
        <ul class="cart-down">
            @foreach(session('cart')->items as $item)
            <li class="cart_item">
                <a class="cart-img" href="{{route('product', $item['product']->url)}}">
                    <img src="{{productImg($item['product'])}}" alt="">
                </a>
                <div class="center-info">
                    <a class="cart-name" href="{{route('product', $item['product']->url)}}">{{$item['product'][_lt()]}}</a>
                    <div class="prod-info">
                        <span class="quantity">{{$item['qty']}} <em class="spr">x</em> </span><span
                                class="cart-price">{{$item['product']->price}} {{$item['product']->currency}}</span>
                    </div>
                </div>
                <a class="delete" href="{{route('delete-from-cart', $item['product']->id)}}"> </a>
            </li>
            @endforeach
            <li>
                @foreach(session('cart')->totalPrice as $currency => $total)
                @if ($total)
                <div class="cart-price-total"><strong>Total:</strong>&nbsp;<span>{{$total . ' ' . $currency}}</span></div>
                @endif
                @endforeach
            </li>
            <li>
                <div class="cart-bottom">
                    <a class="btn btn-success" href="{{route('show-cart')}}"><span class="cssButton">@lang('g.Cart')</span></a>
                    <a class="btn btn-success1" href="#"><span class="cssButton normal_button button  button_checkout"
                                onmouseover="this.className='cssButtonHover normal_button button  button_checkout button_checkoutHover'"
                                onmouseout="this.className='cssButton normal_button button  button_checkout'">&nbsp;@lang('g.checkout')&nbsp;</span></a>
                </div>
            </li>
        </ul>
    </div>
    @else
    <div class="shopping_cart_content" id="shopping_cart_content">
        <div class="none"> @lang('Your cart is empty')</div>
    </div>
    @endif
</div>