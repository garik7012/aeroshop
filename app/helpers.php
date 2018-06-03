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
        return explode(', ', $product->images)[0];
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
