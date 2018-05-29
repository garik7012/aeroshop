<div class="centerBoxWrapper clearfix" id="featuredProducts">
    <h1 class="centerBoxHeading main-page_heading">Featured Products</h1>
    <ul class="prod-list1 clearfix w25">
        @foreach($products as $product)
        <li class="centerBoxContentsFeatured centeredContent back  i{{$loop->iteration < 5 ? $loop->iteration: $loop->iteration - 4}}" style="width:25%;">
            <div class="product-col" data-match-height="featured">
                <h5><a class="product-name name" href="#">{{$product[$locale . '_title']}} ({{$product->category[$locale . '_title']}})</a></h5>
                <div class="img">
                    <a href="#"><img src="{{explode(', ', $product->images)[0]}}" class="img-responsive" alt="Lorem ipsum dolor sit amet." title=" Lorem ipsum dolor sit amet." width="200" height="200"></a>
                    <div class="price">
                        <strong><span class="productSalePrice">{{$product->price}} {{$product->currency}}</span></strong>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="prod-info">
                    <div class="product-buttons">
                        <div class="button"><a class="btn add-to-cart" href="#"><span class="cssButton normal_button button  button_add_to_cart" onmouseover="this.className='cssButtonHover normal_button button  button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton normal_button button  button_add_to_cart'">&nbsp;Add to Cart&nbsp;</span></a></div>
                        <div class="button1"><a class="btn products-button" href="{{route('product', ['ulr' => $product->url])}}"><span class="cssButton normal_button button  button_goto_prod_details" onmouseover="this.className='cssButtonHover normal_button button  button_goto_prod_details button_goto_prod_detailsHover'" onmouseout="this.className='cssButton normal_button button  button_goto_prod_details'">&nbsp;Details&nbsp;</span></a></div>
                    </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>