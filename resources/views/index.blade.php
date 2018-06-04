@extends('layouts.main')

@section('slider')
    @include('front-side.index.slider')
@endsection
@section('content')
<div class="centerColumn" id="indexDefault">
    <!-- bof: featured products  -->
    @include('front-side.index.featured')
    <!-- eof: featured products  -->
</div>
@endsection

@push('sections')
    <section class="main-page_description">
        <div class="container">
            <div class="row">
                <div class="main-col left_column col-sm-12 ">
                    <div class="centerBoxWrapper clearfix">
                        <h1>{{$page->lang->title}}</h1>
                        {!! $page->lang->description !!}
                </div>
                </div>
            </div>
        </div>
    </section>
@endpush