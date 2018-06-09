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
                <div class="col-sm-12 ">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    @stack('sections')
    <!-- ========== FOOTER ========== -->
    @include('layouts._partials.footer')
    <!-- ============================ -->
</div>
<!-- ========================================= -->
@include('layouts._partials.scripts')
</body>
</html>