<div class="centerBoxWrapper" id="relatedProducts">
    <h2 class="centerBoxHeading clearfix">@lang('Related products')</h2>
    <div class="row">
        @foreach($relatedProducts as $related)
        <div class="col-xs-12 col-sm-4 col-md-2">
            <div data-match-height="items-e" class="product-col">
                <div class="img">
                    <a href="{{route('product', ['url' => $related->url])}}">
                        <img src="{{asset($related->mainImage->url)}}" class="img-responsive" alt="image">
                    </a>
                </div>
                <div class="prod-info">
                    <a class="product-name name" href="{{route('product', ['url' => $related->url])}}">{{$related[_lt()]}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>