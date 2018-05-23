<?php
//languages switch
Route::get('setlocale/{lang}', function ($lang) {
    $referer = Redirect::back()->getTargetUrl();
    $parse_url = parse_url($referer, PHP_URL_PATH);
    $segments = explode('/', $parse_url);
    if (in_array($segments[1], config('app')['languages'])) {
        unset($segments[1]); //удаляем метку
    }
    if ($lang != config('app')['mainLanguage']){
        array_splice($segments, 1, 0, $lang);
    }
    $url = Request::root().implode("/", $segments);

    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    return redirect($url);
})->name('setlocale');
