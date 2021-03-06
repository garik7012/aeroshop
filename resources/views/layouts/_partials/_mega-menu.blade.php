<div id="mega-wrapper" class="stickUpTop"><!-- bof mega-wrapper -->
    <ul class="mega-menu col-sm-12"><!-- bof mega-menu -->
        <li class="categories-li"><a class="drop">@lang('g.categories')</a><!-- bof cateories    -->
            <div class="dropdown col-9">
                <div class="levels">
                    <ul class="level2">
                    @foreach($categories->where('parent_id', 0) as $category)
                    @if ($category->old_number === null)
                        <li data-match-height="cat-ul-gen" class="submenu col-inner">
                            <a href="{{route('category', $category->id)}}">{{$category[_lt()]}}</a>
                            <ul class="level3">
                                @foreach($categories->where('parent_id', $category->id) as $child)
                                    <li><a href="{{route('category', $child->id)}}">{{$child[_lt()]}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @endforeach
                    @foreach($categories->where('parent_id', 0) as $category)
                    @if ($category->old_number)
                    <li data-match-height="cat-ul-gen" class="submenu col-inner">
                        <a href="{{route('category', $category->id)}}">{{$category[_lt()]}}</a>
                    </li>
                    @endif
                    @endforeach
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <span class="plus"></span></li><!-- eof categories  -->

        <li class="quicklinks-li"><a class="drop">@lang('site.menu.quick')</a><span class="label"></span><!-- bof quick links  -->
            <div class="dropdown col-2 ">
                <div class="firstcolumn">
                    <nav>
                        <ul class="ez-menu">
                            <li class="first">
                                <a href="{{route('articles')}}">
                                    <span>@lang('g.articles')</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('contact-us')}}">
                                    <span>@lang('g.contacts')</span>
                                </a>
                            </li>
                            <li class=" last ">
                                <a href="{{route('faq')}}">
                                    <span>FAQ</span>
                                </a>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    </nav>
                </div>
            </div>
            <span class="plus"></span></li><!-- eof quick links -->
        <li class="manufacturers-li"><a class="drop">@lang('g.Manufacturers')<span class="label"></span></a><!--bof shop by brand   -->
            <div class="dropdown col-3">
                <div class="firstcolumn">
                    <ul>
                        @foreach($brands as $brand)
                        <li><a href="{{route('brand-products', $brand->id)}}">{{$brand->title}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <span class="plus"></span></li>
        <li class="gallery-li"><a href="#">@lang('g.gallery')<span class="label">@lang('g.new')</span></a></li><!-- eof information -->
    </ul><!-- eof mega-menu -->

</div><!-- eof mega-wrapper -->