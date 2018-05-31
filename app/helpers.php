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
