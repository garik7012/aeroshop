@extends('layouts.main')
@section('title', $product[$_lt])
@section('keywords', $product->pageLang->keywords)
@section('description', $product->pageLang->seo_description ? $product->pageLang->seo_description: substr(strip_tags($product->pageLang->description), 0, 255))
@section('content')
    <section class="ie9_all">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="navBreadCrumb" class="breadcrumb">  <a class="home" href="{{route('index')}}"></a>
                        @if ($product->category->parent_id)
                        <a href="{{route('category', $product->category->parent_id)}}">{{$categories->where('id', $product->category->parent_id)->first()[$_lt]}}</a>
                        @endif
                        <a href="{{route('category', $product->category->id)}}">{{$product->category[$_lt]}}</a>
                        <span> {{$product[$_lt]}}</span>
                    </div>
                </div>
                <div class="main-col left_column">
                    <div class="row">
                        <div class="center_column col-xs-12 col-sm-12 ">
                            <div class="centerColumn" id="productGeneral">
                                <div class="wrapper bot-border"></div>
                                <div class="tie">
                                    <div class="tie-indent">
                                        <div class="page-content">
                                            <div class="row">
                                                <div class="main-image col-xs-12 col-sm-6">
                                                     <!--bof Main Product Image -->
                                                    <div id="productMainImage" class="pull-left image-block">
                                                        <span class="image">
                                                            <a href="{{explode(', ',  $product->images)[0]}}" rel="group1">
                                                                <img src="{{explode(', ',  $product->images)[0]}}" class="img-responsive fancybox" alt="g" >
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <!--eof Main Product Image-->
                                                    <!--bof Additional Product Images -->
                                                    <ul id="productAdditionalImages">
                                                        @foreach (explode(', ',  $product->images) as $image)
                                                        <li class="additionalImages centeredContent back" style="width:20%;">
                                                            <a href="{{$image}}" @if($loop->index)rel="group1"@endif>
                                                                <img src="{{$image}}" class="img-responsive" alt="" width="114" height="114">
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    <!--eof Additional Product Images -->
                                                    <div class="video_desc">
                                                        <div class="row">
                                                            <!--bof  -->
                                                            @if (false)
                                                                <div id="productYouTube" class="col-xs-12 col-sm-12">
                                                                    <iframe src="https://www.youtube-nocookie.com/embed/mZ5Gw7rhYkc?rel=0&amp;showinfo=0&amp;fs=0"
                                                                            allowfullscreen=""></iframe>
                                                                </div>
                                                        @endif
                                                        <!--eof YouTube -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pb-center-column col-xs-12 col-sm-6">
                                                    <!--bof free ship icon  -->
                                                    <!--eof free ship icon  -->
                                                    <h1 class="title_product">{{$product[$_lt]}}</h1>
                                                    <!--bof Product description -->
                                                    <div id="productDescription" class="description biggerText col-sm-12 col-xs-12 col-sm-12 ">
                                                        {!! ($product->pageLang->description) !!}
                                                    </div>
                                                    <!--eof Product description -->
                                                    <!--bof Product details list  -->
                                                    @if ($product->country_id)
                                                    <ul class="instock">
                                                        <li><strong>@lang('Manufactured by'): </strong>{{$product->country[$_lt]}}</li>
                                                    </ul>
                                                    @endif
                                                    <!--eof Product details list  -->
                                                    <div class="wrapper atrib"><span class="quantity_label">@lang('Extra options')</span></div>
                                                    <div class="wrapper atrib2">
                                                        <!--bof Attributes Module -->
                                                        <div id="productAttributes">
                                                            @foreach($product->properties as $property)
                                                            <div class="wrapperAttribsOptions">
                                                                <strong>{{$property->key[$_lt]}}:</strong> {{$property[App::getLocale() . '_value']}} {{$property->unit[$_lt] ?? ''}}
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <!--eof Attributes Module -->

                                                        <div class="add_to_cart_block">
                                                            <!--bof Add to Cart Box -->
                                                            <div id="prod-price">
                                                                <span class="productSalePrice">{{$product->price}} {{$product->currency}}</span></div>
                                                            <div class="clearfix"></div>

                                                            <!--eof Add to Cart Box-->
                                                        </div>
                                                    </div>
                                                    <div id="button_product">
                                                        <div class="add_to_cart_row"><strong class="fleft text2"><input
                                                                        type="text" class="form-control"
                                                                        name="cart_quantity" value="1" maxlength="6"
                                                                        size="8"><input type="hidden" name="products_id"
                                                                                        value="4"></strong><span
                                                                    class="buttonRow"><input type="submit"
                                                                                             class="btn btn-success add-to-cart"
                                                                                             value="Add to Cart"></span>
                                                        </div>
                                                    </div>
                                                    <!-- bof Social Media Icons -->
                                                    <!-- eof Social Media Icons -->
                                                </div>
                                            </div>
                                            @include('front-side.product._related')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection