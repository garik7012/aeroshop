<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (isset($page))
    <meta name="keywords" content="{{$page->lang->keywords}}">
    <meta name="description" content="{{$page->lang->seo_description}}">
    @else
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($page))
    <title>{{$page->lang->seo_title}}</title>
    @else
    <title>@yield('title', 'AeroShop')</title>
    @endif
    @if (isset($canonical))
    <link rel="canonical" href="{{url(getPathWithoutLang())}}"/>
    @else
    <!-- Alternate -->
    <link rel="alternate" hreflang="ru" href="{{url(getPathWithoutLang())}}" />
    <link rel="alternate" hreflang="uk" href="{{url('uk/' . getPathWithoutLang())}}" />
    <link rel="alternate" hreflang="en" href="{{url('en/' . getPathWithoutLang())}}" />
    @endif
    <!-- Fonts -->
    <link href="/css/fonts.css" rel="stylesheet" type="text/css">

    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('css/extras.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--[if lt IE 8]><div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a href="https://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="https://storage.ie6countdown.com/assets/100//img/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div><![endif]-->
    <!--[if lte IE 9]> <html class="ie9_all" lang="en"> <![endif]-->
    <!--[if gte IE 9]>
    <style type="text/css">
        section {
            filter: none;
        }
    </style>
    <![endif]-->
</head>