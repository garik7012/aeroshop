<?php

if (! function_exists('_lt')) {
    function _lt()
    {
        return app()->getLocale() . '_title';
    }
}

if (! function_exists('productImg')) {
    function productImg($product)
    {
        return asset($product->mainImage->url);
    }
}

if (! function_exists('getPathWithoutLang')) {
    function getPathWithoutLang()
    {
        $path = Request::path();
        if (app()->getLocale() != 'ru') {
            $path = explode('/', $path);
            unset($path[0]);
            $path = implode('/', $path);
        }

        return $path;
    }
}

if (!function_exists('is_route_active')) {
    /**
     * return 'active' if current route name has $mask
     * @param $mask - string
     * @return string
     */
    function is_route_active($mask)
    {
        str_is($mask, Route::currentRouteName()) ? $active = 'active' : $active = '';
        return $active;
    }
}
