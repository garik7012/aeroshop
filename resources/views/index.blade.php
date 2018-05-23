@extends('layouts.main')

@section('content')
@include('front-side.index.slider')
<section class="ie9_all">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            </div>
            <div class="main-col left_column col-sm-12 ">
                <div class="row">
                    <div class="center_column col-xs-12 col-sm-12 with_col ">
                        <div class="centerColumn" id="indexDefault">
                            <!-- bof: featured products  -->
                            @include('front-side.index.featured')
                            <!-- eof: featured products  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </section>
@endsection