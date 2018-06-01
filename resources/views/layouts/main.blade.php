<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts._partials.head')
<body id="indexHomeBody">
<div id="page">
    @include('layouts._partials.header')
    @yield('slider')
    <section class="ie9_all">
        <div class="container">
            <div class="row">
                @yield('breadcrumbs')
                <div class="main-col left_column col-sm-12 ">
                    <div class="row">
                        <div class="center_column col-xs-12 col-sm-12 with_col ">
                        @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== FOOTER ========== -->
    @include('layouts._partials.footer')
    <!-- ============================ -->
</div>
<!-- ========================================= -->
@include('layouts._partials.scripts')
</body>
</html>