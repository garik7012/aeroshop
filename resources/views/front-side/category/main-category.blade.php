@extends('layouts.main')

@section('content')
    <section class="ie9_all">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
                        @if ($category->parent_id)
                            <a href="{{route('category', $category->parent_id)}}">{{$categories->where('id', $category->parent_id)->first()[$lt]}}</a>
                        @endif
                        <span> {{$category[$_lt]}}</span>
                    </div>
                </div>
                <div class="main-col left_column col-sm-12 ">
                    <div class="row">
                        <div class="center_column col-xs-12 col-sm-12 with_col ">
                            <div class="centerColumn categoryColumn" id="indexCategories">
                                <h1 class="centerBoxHeading">{{$category[$_lt]}}</h1>
                                <div class="content_scene_cat_bg">
                                    <div id="category-image" class="categoryImg">
                                        <img src="http://placehold.it/1170x450" class="img-responsive" alt="" width="1040" height="400">              <div class="cat_desc">
                                            <div class="catDescContent">
                                                The supplies we sell in our store are of premium quality and will serve you for years. We enrich our Plumbing Supplies Store only with the well tested models which have won trust and are known thanks to their resistance to depreciation. Modern and reliable they will cause you no troubles in further exploitation. Trust our plumbing experience and we will justify it.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="subcategories">
                                    <p class="subcategory-heading">Subcategories</p>
                                    <ul class="row">
                                        @foreach($categories->where('parent_id', $category->id) as $categ)
                                        <li class="categoryListBoxContents col-md-3 col-sm-6 col-xs-12">
                                            <a href="{{route('category', $categ->id)}}">
                                                <div data-match-height="catRow" class="subcategory-image " style="height: 116px;">
                                                    <img src="http://placehold.it/1170x450" class="img-responsive" alt="Lorem" title=" Lorem " width="158" height="61">
                                                </div>
                                                <span>{{$categ[$_lt]}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="column left_column col-xs-12 col-sm-3">
                </aside>
                <div class="clearfix"></div>
                <!--bof-custom block display-->
                <!-- bof tm custom block -->
                <!-- eof tm custom block -->

                <!--eof-custom block display-->
            </div>
        </div>
    </section>
@endsection