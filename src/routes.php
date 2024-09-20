<?php

use Illuminate\Support\Facades\Route;

$langUrl = config('vncore-config.front.route.VNCORE_SEO_LANG') ?'{lang?}/' : '';
Route::group(
    [
        'middleware' => VNCORE_FRONT_MIDDLEWARE,
    ],
    function () use($langUrl){
        foreach (glob(__DIR__ . '/Routes/Front/*.php') as $filename) {
            $this->loadRoutesFrom($filename);
        }

        if (file_exists(app_path('Vncore/Admin/Controllers/HomeController.php'))) {
            $nameSpaceHome = 'App\Vncore\Front\Controllers';
        } else {
            $nameSpaceHome = 'Vncore\Front\Controllers';
        }
        Route::get('/', $nameSpaceHome.'\HomeController@index')->name('front.home');
        
        //Language
        Route::get('locale/{code}', function ($code) {
            session(['locale' => $code]);
            return back();
        })->name('front.locale');
    }
);


// Admin routes
Route::group(
    [
        'prefix' => VNCORE_ADMIN_PREFIX,
        'middleware' => VNCORE_ADMIN_MIDDLEWARE,
    ],
    function () {
        foreach (glob(__DIR__ . '/Routes/Admin/*.php') as $filename) {
            $this->loadRoutesFrom($filename);
        }
    }
);
