<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li class="{{str_is('dashboard', Route::currentRouteName()) ? 'active' : ''}}"><a href="/admin-side"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{is_route_active('admin.pages.*')}}"><a href="{{route('admin.pages.all')}}"><i class="fa fa-file"></i> <span>Страницы</span></a></li>
            <li class="{{is_route_active('admin.categories.*')}}"><a href="{{route('admin.categories.all')}}"><i class="fa fa fa-files-o"></i> <span>Категории</span></a></li>
            <li class="{{is_route_active('admin.products.*')}}"><a href="{{route('admin.products.all')}}"><i class="fa fa-list"></i> <span>Продукты</span></a></li>
            <li class="{{is_route_active('admin.orders.*')}}"><a href="{{route('admin.orders.all')}}"><i class="fa fa-shopping-cart"></i> <span>Заказы</span></a></li>
            <li class="{{is_route_active('admin.messages.*')}}"><a href="{{route('admin.messages.all')}}"><i class="fa fa-envelope"></i> <span>Сообщения</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>