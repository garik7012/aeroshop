<div id="productListing">
    <div class="top-pg">
        <div id="productsListingTopNumber" class="navSplitPagesResult fleft">Displaying <strong>{{$products->count()}}</strong> products</div>
        <div class="top-paginator">
            <ul id="productsListingListingTopLinks" class="pagination"> &nbsp;</ul>
            <ul class="listing_view hidden-xs">
                <li id="grid" class="grid active">
                    <a rel="nofollow" href="javascript:void(0);" title="Grid"></a>
                </li>
                <li id="list">
                    <a rel="nofollow" href="javascript:void(0);" title="List"></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="tie tie-margin1">
        <div class="tie-indent">
            <ul class="product_list row grid">
                @foreach($products as $product)
                    <li class="col-xs-12 col-sm-6 col-md-3">
                        <div class="product-col" data-match-height="featured">
                            <div class="img">
                                <img src="{{asset($product->mainImage->url)}}" class="img-responsive" alt="product image">
                            </div>
                            <div class="prod-info">
                                <h5 itemprop="name">
                                    <a class="" href="{{route('product', $product->url)}}">{{$product[_lt()]}}</a>
                                </h5>
                                <div itemprop="description" class="text">
                                    <span class="grid-desc">{!! substr(strip_tags($product->lang->description), 0, 255) !!}</span>
                                    <span class="list-desc" style="display: none;">{!!  preg_replace('/<iframe.*?\/iframe>/i','', $product->lang->description) !!}</span>
                                </div>
                                <div class="product-buttons">
                                    <div class="content_price">
                                        <span itemprop="price" class="price product-price"><span class="productSalePrice">{{$product->price}} {{$product->currency}}</span></span>
                                        <div class="clearfix"></div>
                                        <div class="product-availability"><strong>{{$product->availability[_lt()]}}</strong></div>
                                        <div class="button">
                                            <a class="btn add-to-cart" href="{{route('one-to-cart', $product->id)}}">
                                                <span class="cssButton normal_button button  button_add_to_cart" onmouseover="this.className='cssButtonHover normal_button button  button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton normal_button button  button_add_to_cart'">&nbsp;@lang('Add to Cart')&nbsp;</span>
                                            </a>
                                        </div>
                                        <div class="button1">
                                            <a class="btn" href="{{route('product', $product->url)}}">
                                                <span class="cssButton normal_button button  button_goto_prod_details" onmouseover="this.className='cssButtonHover normal_button button  button_goto_prod_details button_goto_prod_detailsHover'" onmouseout="this.className='cssButton normal_button button  button_goto_prod_details'">&nbsp;@lang('g.Details')&nbsp;</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>