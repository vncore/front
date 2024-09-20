<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

if (!function_exists('vncore_route_front') && !in_array('vncore_route_front', config('vncore_functions_except', []))) {
    /**
     * Render route
     *
     * @param   [string]  $name
     * @param   [array]  $param
     *
     * @return  [type]         [return description]
     */
    function vncore_route_front($name, $param = [])
    {
        if (!config('vncore-config.front.route.VNCORE_SEO_LANG')) {
            $param = Arr::except($param, ['lang']);
        } else {
            $arrRouteExcludeLanguage = ['front.home','locale', 'banner.click'];
            if (!key_exists('lang', $param) && !in_array($name, $arrRouteExcludeLanguage)) {
                $param['lang'] = app()->getLocale();
            }
        }
        
        if (Route::has($name)) {
            try {
                $route = route($name, $param);
            } catch (\Throwable $th) {
                $route = url('#'.$name.'#'.implode(',', $param));
            }
            return $route;
        } else {
            if ($name == 'front.home') {
                return url('/');
            } else {
                return url('#'.$name);
            }
        }
    }
}