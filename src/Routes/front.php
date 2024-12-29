<?php

$suffix = vncore_config('SUFFIX_URL')??'.html';
$langUrl = config('vncore-config.front.route.VNCORE_SEO_LANG') ?'{lang?}/' : '';

if (file_exists(app_path('Vncore/Front/Controllers/HomeController.php'))) {
    $nameSpaceHome = 'App\Vncore\Front\Controllers';
} else {
    $nameSpaceHome = 'Vncore\Front\Controllers';
}
Route::get('/', $nameSpaceHome.'\HomeController@index')->name('front.home');


//--Please keep 2 lines route (pages + pageNotFound) at the bottom
Route::get($langUrl.'{alias}'.$suffix, $nameSpaceHome.'\HomeController@pageDetailProcessFront')->name('page.detail');       
//=======End Front