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
                        <p>Free Shipping</p>
                        <div>
                            <span>on orders over $499.</span>
                            <span>This offer is valid on all our store items.</span>
                        </div>
                    </div>
                    <div class="shopping_cart" id="shopping_cart">
                        <!-- ========== SHOPPING CART ========== -->
                        <div class="shop-box-wrap">
                            <span class="cart_title">Cart</span><span class="st3"> (empty) </span>                                </div>
                        <div class="shopping_cart_content" id="shopping_cart_content">
                            <div class="none"> Your cart is empty</div>                                </div>
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
                        <div id="mega-wrapper" class="stickUpTop"><!-- bof mega-wrapper -->
                            <ul class="mega-menu col-sm-12"><!-- bof mega-menu -->
                                <li class="categories-li"><a class="drop">Categories<span class="label">New!</span></a><!-- bof cateories    -->
                                    <div class="dropdown col-9">
                                        <div class="levels">
                                            <ul class="level2"><li data-match-height="cat-ul-gen" class="submenu col-inner" style="height: 163px;">
                                                    <a href="#">Bathroom</a><ul class="level3"><li>
                                                            <a href="#">Lorem</a></li><li>
                                                            <a href="#">Ipsum</a></li><li>
                                                            <a href="#">Dolor</a></li><li>
                                                            <a href="#">Sit epsum</a></li></ul></li><li data-match-height="cat-ul-gen" class="submenu col-inner" style="height: 163px;">
                                                    <a href="#">Home &amp; Garden</a><ul class="level3"><li>
                                                            <a href="#">Doloriicus</a></li><li>
                                                            <a href="#">Vivamus</a></li><li>
                                                            <a href="#">Nullam</a></li><li>
                                                            <a href="#">Vivamus fauci</a></li></ul></li><li data-match-height="cat-ul-gen" class="submenu col-inner" style="height: 115px;">
                                                    <a href="#">Kitchen</a><ul class="level3"><li>
                                                            <a href="#">Cursus nisi et</a></li><li>
                                                            <a href="#">Vivamus congue</a></li><li>
                                                            <a href="#">Dapibus elit</a></li></ul></li><li data-match-height="cat-ul-gen" class="submenu col-inner" style="height: 115px;">
                                                    <a href="#">Repair Parts</a><ul class="level3"><li>
                                                            <a href="#">Quisque condi</a></li><li>
                                                            <a href="#">Lorem eget su</a></li><li>
                                                            <a href="#">Nullam eget</a></li></ul></li><li data-match-height="cat-ul-gen" class="submenu col-inner last" style="">
                                                    <a href="#">Tools</a><ul class="level3"><li>
                                                            <a href="#">Facilisis pur</a></li><li>
                                                            <a href="#">Finibus mi</a></li></ul></li><div class="clearfix"></div><li>
                                                    <a href="#">Water Heaters</a></li><li>
                                                    <a href="#">Supplies</a></li><li>
                                                    <a href="#">Sinks</a></li><li>
                                                    <a href="#">Water Taps</a></li><li class="last">
                                                    <a href="#">Accessories</a></li><div class="clearfix"></div></ul>
                                        </div>

                                        <div class="clearfix"></div>

                                    </div>
                                    <span class="plus"></span></li><!-- eof categories  -->

                                <li class="quicklinks-li1">
                                    <a class="drop">sdf</a>
                                    <div class="dropdown col-2 ">
                                        <div class="firstcolumn">
                                            <h2>3213131</h2>
                                        </div>
                                    </div>
                                </li><!-- eof quick links -->
                                <li class="quicklinks-li"><a class="drop">Quick Links</a><span class="label"></span><!-- bof quick links  -->
                                    <div class="dropdown col-2 ">
                                        <div class="firstcolumn">
                                            <nav>
                                                <ul class="ez-menu">

                                                    <li class="  first">
                                                        <a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=products_new#">
                                                            <span>New Products</span>
                                                        </a>
                                                    </li>

                                                    <li class="  ">
                                                        <a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=specials#">
                                                            <span>Specials</span>
                                                        </a>
                                                    </li>

                                                    <li class="  ">
                                                        <a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=reviews#">
                                                            <span>Reviews</span>
                                                        </a>
                                                    </li>

                                                    <li class="  ">
                                                        <a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=contact_us#">
                                                            <span>Contacts</span>
                                                        </a>
                                                    </li>

                                                    <li class=" last ">
                                                        <a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=gv_faq#">
                                                            <span>FAQs</span>
                                                        </a>
                                                    </li><div class="clearfix"></div>

                                                </ul>
                                            </nav>

                                        </div>
                                    </div>
                                    <span class="plus"></span></li><!-- eof quick links -->



                                <li class="information-li"><a class="drop">Info<span class="label"></span></a><!-- bof information -->

                                    <div class="dropdown col-3">


                                        <h3>General Info</h3>
                                        <ul>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=site_map#">Site Map</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=gv_faq#">Gift Certificate FAQ</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=discount_coupon#">Discount Coupons</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=unsubscribe#">Newsletter Unsubscribe</a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <h3 class="second">Customers</h3>
                                        <ul>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=login#">Log In</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=create_account#">Create Account</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=contact_us#">Contact Us</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=shippinginfo#">Shipping &amp; Returns</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=privacy#">Privacy Notice</a></li>
                                            <li><a href="https://livedemo00.template-help.com/zencart_55417/index.php?main_page=conditions#">Conditions of Use</a></li>
                                        </ul>

                                    </div>

                                    <span class="plus"></span></li><!-- eof information -->

                                <li class="customer_service"><a class="drop">Shipping &amp; Returns<span class="label"></span></a><!-- bof customer service -->

                                    <div class="dropdown col-5">

                                        <div class="col_cs">
                                            <h3>Shipping</h3>
                                        </div>

                                        <div class="col_cs">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam interdum feugiat ipsum vehicula sollicitudin. Integer sed lacus eget risus consectetur ullamcorper. Pellentesque rutrum ullamcorper faucibus. Nam porttitor iaculis enim, mattis tristique velit tristique bibendum. </p>
                                        </div>

                                        <div class="col_cs">
                                            <h3>Delivery</h3>
                                        </div>
                                        <div class="col_cs">
                                            <p>Etiam interdum feugiat ipsum vehicula sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed lacus eget risus consectetur ullamcorper. Pellentesque rutrum ullamcorper faucibus. Nam porttitor iaculis enim, mattis tristique velit tristique bibendum. </p>
                                        </div>
                                    </div><!-- eof customer service -->

                                    <span class="plus"></span></li>

                            </ul><!-- eof mega-menu -->

                        </div><!-- eof mega-wrapper -->
                        <!--eof-mega menu display-->
                        <div class="clearBoth"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>