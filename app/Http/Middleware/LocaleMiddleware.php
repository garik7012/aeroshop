<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Request;

class LocaleMiddleware
{
    /**
     * Check is correct language in the URL
     *
     * @return string|null
     */
    public static function getLocale()
    {
        $uri = Request::path();
        $segmentsURI = explode('/',$uri);
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('app')['languages'])) {
            if ($segmentsURI[0] != config('app')['mainLanguage']) return $segmentsURI[0];
        }
        return null;
    }
    /**
     * Set locale from language mark from URL
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //no doubles URI (public и public/index.php)
        if (preg_match("/^\/(public)|(public\/index.php)/",$request->getBaseUrl()) ) {
            $newUrl = str_replace($request->getBaseUrl(), '', $request->getUri());
            header('Location: '.$newUrl, true, 301);
            exit();
        }
        $locale = self::getLocale();
        if($locale) App::setLocale($locale);
        else App::setLocale(config('app')['mainLanguage']);
        return $next($request);
    }
}
