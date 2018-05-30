<?php

if (! function_exists('_lt')) {
    function _lt()
    {
        return app()->getLocale() . '_title';
    }
}