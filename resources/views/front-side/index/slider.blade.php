<div class="slider">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <a href="#" class="nivo-imageLink"><img src="/img/slide1.jpg" class="img-responsive"></a>
            <a href="#" class="nivo-imageLink"><img src="/img/slide2.jpg" class="img-responsive"></a>
            <a href="#" class="nivo-imageLink"><img src="/img/slide3.jpg" class="img-responsive"></a>
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