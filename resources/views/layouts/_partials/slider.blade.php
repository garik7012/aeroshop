<div class="slider">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <a href="#" class="nivo-imageLink"><img src="http://placehold.it/2000x500" class="img-responsive"></a>
            <a href="#" class="nivo-imageLink"><img src="http://placehold.it/1900x500" class="img-responsive"></a>
            <a href="#" class="nivo-imageLink"><img src="http://placehold.it/2000x550" class="img-responsive"></a>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $(document).ready(function() {
        $('#slider').nivoSlider({
            effect: 'fold',
            animSpeed: 500,
            pauseTime: 4000,
            directionNav: true,
            directionNavHide: true,
            controlNav: false,
            pauseOnHover: true,
            captionOpacity: 0.8
        });
    });
</script>
@endpush