<header>
    <div class="nav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-7 col-lg-7 fright">
                    <div id="langs_block" class="top_dropdown_menu">
                        <!-- ========== LOCALES ========= -->
                        <span class="trigger_down dropdown-toggle" data-toggle="dropdown"><span class="lbl">{{strtoupper(App::getLocale())}}</span></span>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?= route('setlocale', ['lang' => 'en']) ?>">Eng</a></li>
                            <li><a href="<?= route('setlocale', ['lang' => 'ru']) ?>">Рус</a></li>
                            <li><a href="<?= route('setlocale', ['lang' => 'uk']) ?>">Укр</a></li>
                        </ul>
                        <!-- ====================================== -->
                    </div>
                </div>
                <div class="col-xs-12 col-md-5 col-lg-5">
                    <div class="phone">
                        <p><a href="tel:8002345679">(800) 234-5678</a></p>
                        <span><a href="mailto:test@test.com">test@test.com</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="container">
            <div class="row clearfix">
                <div id="header_logo" class="col-xs-12 col-sm-3">
                    <!-- ========== LOGO ========== -->
                    <a href=""><img src="http://placehold.in/270x117" alt="logo"></a>
                    <!-- ========================== -->
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9">
                    <div class="header_cust_block clearfix">
                        <p>@lang('3% discount')</p>
                        <div>
                            <span>@lang('on orders over') 10 000 UAN.</span>
                            <span>@lang('This offer is valid on all our store items').</span>
                        </div>
                    </div>
                    <div class="shopping_cart" id="shopping_cart">
                        <!-- ========== SHOPPING CART ========== -->
                        <div class="shop-box-wrap">
                            <span class="cart_title">@lang('g.Cart')</span><span class="st3"> (@lang('g.empty')) </span>                                </div>
                        <div class="shopping_cart_content" id="shopping_cart_content">
                            <div class="none"> @lang('Your cart is empty')</div>                                </div>
                    </div>
                    <!-- =================================== -->
                    <div id="search_block" class="clearfix">
                        <!-- ========== SEARCH ========== -->
                        <form name="quick_find_header" action="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=advanced_search_result" method="get" class="form-inline form-search pull-right">
                            <input type="hidden" name="main_page" value="advanced_search_result"><input type="hidden" name="search_in_description" value="1"><input type="hidden" name="zenid" value="ob0ch2vq2sgrisn45b5st0t236">                                        <label class="sr-only" for="searchInput">Search</label>
                            <input class="form-control" id="searchInput" type="text" name="keyword" autocomplete="off"><div id="suggestions" style="left: -81px;"></div>
                            <button type="submit" class="button-search"><i class="fa fa-search"></i><b>Search</b></button>
                        </form>
                        <!-- ============================ -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="top_menu clearfix">
                        <div class="cat-title">MENU</div><!--bof-mega menu display-->
                        @include('layouts._partials._mega-menu', [
                            'brands' => \App\Models\Brand::all()
                            ])
                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>