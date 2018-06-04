<footer>
    <div class="footer-container">
        <div class="container">
            <div class="row">
                <div class="footer-menu col-xs-12 col-sm-3">
                    <h2 class="title_btn1">@lang('site.menu.quick')</h2>
                    <div class="ezpagesFooterCol col1" style="width: 100%">
                        <ul>
                            <li><a href="{{route('index')}}">@lang('site.menu.home')</a></li>
                            <li><a href="{{route('all-categories')}}">@lang('site.menu.categories')</a></li>
                            <li><a href="{{route('index')}}">@lang('g.articles')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="account col-xs-12 col-sm-3 mb">
                    <h2 class="title_btn2">@lang('site.menu.customers')</h2>
                    <ul class="account_list">
                        <li><a href="{{route('delivery')}}">@lang('site.menu.shipping')</a></li>
                        <li><a href="{{route('faq')}}">@lang('site.menu.faq')</a></li>
                    </ul>
                </div>
                <div class="social col-xs-12 col-sm-3 mb">
                    <h2 class="title_btn3">@lang('site.menu.follow')</h2>
                    <ul class="social_list">
                        <li><a href="https://www.facebook.com/groups/127900224297326/"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                        <li><a href="https://www.instagram.com/airbrush_kiev/"><i class="fa fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
                <div class="contact-block col-xs-12 col-sm-3 mb">
                    <h2 class="title_btn4">@lang('Contact Us')</h2>
                    <ul class="contact_list">
                        <li><a href="{{route('contact-us')}}">@lang('g.contacts')</a></li>
                        <li class="phone"><a href="tel:+380972918658">+38(097) 291-86-58</a></li>
                        <li class="phone"><a href="tel:+380950585224">+38(095) 058-52-24</a></li>
                    </ul>
                </div>
                <div><!-- {%FOOTER_LINK} --></div>
            </div>
            <div class="back_to_top"><a href="#"></a></div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- ========== COPYRIGHT ========== -->
                    <p>Copyright © 2018 <a href="#" target="_blank">Aeroshop</a>
                    </p>
                    <!-- =============================== -->
                </div>
            </div>
        </div>
    </div>
</footer>