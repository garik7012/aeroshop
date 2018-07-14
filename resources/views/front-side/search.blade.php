@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('g.search')</span>
        </div>
    </div>
@endsection

@section('content')
    <div class="centerColumn categoryColumn" id="indexCategories">
        <h1 class="centerBoxHeading">@lang('Search result for'): "{{$search}}"</h1>
        @if(count($searchResult))
            @include('layouts._partials.product-list', ['products' => $searchResult])
        @else
            <div style="margin-bottom: 270px">
                @lang('Nothing found')
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script src="{{ mix('js/list-greed.js') }}"></script>
@endpush