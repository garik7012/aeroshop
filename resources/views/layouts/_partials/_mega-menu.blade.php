<div id="mega-wrapper" class="stickUpTop"><!-- bof mega-wrapper -->
    <ul class="mega-menu col-sm-12"><!-- bof mega-menu -->
        <li class="categories-li"><a class="drop">Categories<span class="label">New!</span></a><!-- bof cateories    -->
            <div class="dropdown col-9">
                <div class="levels">
                    <ul class="level2">
                    @foreach($categories->where('parent_id', 0) as $category)
                        @if ($category->old_number === null)
                            <li data-match-height="cat-ul-gen" class="submenu col-inner">
                                <a href="#">{{$category[App::getLocale() . '_title']}}</a>
                                <ul class="level3">
                                    @foreach($categories->where('parent_id', $category->id) as $child)
                                        <li><a href="#">{{$child[App::getLocale() . '_title']}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                        <li data-match-height="cat-ul-gen" class="submenu col-inner">
                            <a href="#">{{$category[App::getLocale() . '_title']}}</a>
                        </li>
                        @endif
                    @endforeach
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <span class="plus"></span></li><!-- eof categories  -->

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