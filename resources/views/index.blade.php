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