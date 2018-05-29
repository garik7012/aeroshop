@extends('layouts.main')

@section('content')
    <section class="ie9_all">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
                        <a href="{{route('brands')}}">@lang('g.Manufacturers')</a>
                        <span> {{$brand->title}}</span>
                    </div>
                </div>
                <div class="main-col left_column col-sm-12 ">
                    <div class="row">
                        <div class="center_column col-xs-12 col-sm-12 with_col ">
                            <div class="centerColumn categoryColumn" id="indexCategories">
                                <h1 class="centerBoxHeading">{{$brand->title}}</h1>
                                <div id="productListing">
                                    <div class="top-pg">
                                        <div id="productsListingTopNumber" class="navSplitPagesResult fleft">Displaying <strong>{{$brand->products->count()}}</strong> products</div>
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
                                                @foreach($brand->products as $product)
                                                    <li class="col-xs-12 col-sm-6 col-md-3">
                                                        <div class="product-col" data-match-height="featured">
                                                            <div class="img">
                                                                <img src="{{explode(', ', $product->images)[0]}}" class="img-responsive" alt="product image">
                                                            </div>
                                                            <div class="prod-info">
                                                                <h5 itemprop="name">
                                                                    <a class="" href="#">{{$product[$_lt]}}</a>
                                                                </h5>
                                                                <div itemprop="description" class="text">
                                                                    <span class="grid-desc">{!! substr(strip_tags($product->pageLang->description), 0, 255) !!}</span>
                                                                    <span class="list-desc" style="display: none;">{!!  preg_replace('/<iframe.*?\/iframe>/i','', $product->pageLang->description) !!}</span>
                                                                </div>
                                                                <div class="product-buttons">
                                                                    <div class="content_price">
                                                                        <span itemprop="price" class="price product-price"><span class="productSalePrice">{{$product->price}} {{$product->currency}}</span></span>
                                                                        <div class="clearfix"></div>
                                                                        <div class="button">
                                                                            <a class="btn add-to-cart" href="">
                                                                                <span class="cssButton normal_button button  button_add_to_cart" onmouseover="this.className='cssButtonHover normal_button button  button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton normal_button button  button_add_to_cart'">&nbsp;Add to Cart&nbsp;</span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="button1">
                                                                            <a class="btn" href="{{route('product', $product->url)}}">
                                                                                <span class="cssButton normal_button button  button_goto_prod_details" onmouseover="this.className='cssButtonHover normal_button button  button_goto_prod_details button_goto_prod_detailsHover'" onmouseout="this.className='cssButton normal_button button  button_goto_prod_details'">&nbsp;Details&nbsp;</span>
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
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="column left_column col-xs-12 col-sm-3">
                </aside>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ mix('js/list-greed.js') }}"></script>
@endpush