<?php

use Illuminate\Support\Facades\Route;

$langUrl = config('vncore-config.front.route.VNCORE_SEO_LANG') ?'{lang?}/' : '';
Route::group(
    [
        'middleware' => VNCORE_FRONT_MIDDLEWARE,
    ],
    function () use($langUrl){

        if (file_exists($filename = __DIR__ . '/Routes/front.php')) {
            $this->loadRoutesFrom($filename);
        }
        
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
        if (file_exists($filename = __DIR__ . '/Routes/admin.php')) {
            $this->loadRoutesFrom($filename);
        }
    }
);
