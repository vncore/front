<?php
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => VNCORE_API_MIDDLEWARE,
        'prefix' => 'api',
    ],
    function () {
        Route::group([
        ], function () {
            //
        });
    }
);
