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
                        <p><a href="tel:+380972918658">+38(097) 291-86-58</a></p>
                        <span><a href="mailto:inbox@aeroshop.com.ua">inbox@aeroshop.com.ua</a></span>
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
                    <a href="{{route('index')}}"><img src="/img/logo.png" alt="logo"></a>
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
                    <!-- ========== SHOPPING CART ========== -->
                    @include('layouts._partials._cart')
                    <!-- =================================== -->
                    <div id="search_block" class="clearfix">
                        <!-- ========== SEARCH ========== -->
                        <form name="quick_find_header" action="{{route('search')}}" method="get" class="form-inline form-search pull-right">
                            <input class="form-control" id="searchInput" type="text" name="search" autocomplete="off" maxlength="100">
                            <div id="suggestions" style="left: -81px;"></div>
                            <button type="submit" class="button-search"><i class="fa fa-search"></i><b>@lang('search')</b></button>
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