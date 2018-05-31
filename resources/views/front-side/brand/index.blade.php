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
                                @include('layouts._partials.product-list')
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