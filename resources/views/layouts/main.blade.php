<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('layouts._partials.head')
<body id="indexHomeBody">
<div id="page">
    @include('layouts._partials.header')
    @yield('content')
    <!-- ========== FOOTER ========== -->
    @include('layouts._partials.footer')
    <!-- ============================ -->
</div>
<!-- ========================================= -->
@include('layouts._partials.scripts')
</body>
</html>