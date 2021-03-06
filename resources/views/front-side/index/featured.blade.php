<div class="centerBoxWrapper clearfix" id="featuredProducts">
    <h1 class="centerBoxHeading main-page_heading">@lang('g.featured')</h1>
    <ul class="prod-list1 row w25">
        @foreach($products as $product)
        <li class="centerBoxContentsFeatured centeredContent col-lg-3 col-md-4 col-sm-6 col-xs-12" >
            <div class="product-col" data-match-height="featured">
                <h5><a class="product-name name" href="#">{{$product[$locale . '_title']}} ({{$product->category[$locale . '_title']}})</a></h5>
                <div class="img">
                    <a href="{{route('product', $product->url)}}"><img src="{{productImg($product)}}" class="img-responsive" alt="{{$product[_lt()]}}" width="200" height="200"></a>
                    <div class="price">
                        <strong><span class="productSalePrice">{{$product->price}} {{$product->currency}}</span></strong>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="prod-info">
                    <div class="product-buttons">
                        <div class="button"><a class="btn add-to-cart" href="{{route('one-to-cart', $product->id)}}"><span class="cssButton normal_button button  button_add_to_cart" onmouseover="this.className='cssButtonHover normal_button button  button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton normal_button button  button_add_to_cart'">&nbsp;@lang('Add to Cart')&nbsp;</span></a></div>
                        <div class="button1"><a class="btn products-button" href="{{route('product', ['ulr' => $product->url])}}"><span class="cssButton normal_button button  button_goto_prod_details" onmouseover="this.className='cssButtonHover normal_button button  button_goto_prod_details button_goto_prod_detailsHover'" onmouseout="this.className='cssButton normal_button button  button_goto_prod_details'">&nbsp;@lang('g.Details')&nbsp;</span></a></div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>