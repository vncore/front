<?php
namespace Vncore\Front\Controllers;

use App\Http\Controllers\Controller;

class RootFrontController extends Controller
{
    public $vncore_templatePathFront;
    public $VncoreTemplatePath;
    public function __construct()
    {
        $this->VncoreTemplatePath = 'VncoreTemplatePath::' . vncore_store_info('template','default');
        $this->vncore_templatePathFront = config('vncore-config.front.path_view').'::';
    }
    /**
     * Default page not found
     *
     * @return  [type]  [return description]
     */
    public function pageNotFound()
    {
        vncore_check_view( $this->VncoreTemplatePath . '.notfound');
        return view(
            $this->VncoreTemplatePath . '.notfound',
                [
                'title' => vncore_language_render('front.page_not_found_title'),
                'msg' => vncore_language_render('front.page_not_found'),
                'description' => '',
                'keyword' => ''
                ]
        );
    }

    /**
     * Default item not found
     *
     * @return  [view]
     */
    public function itemNotFound()
    {
        vncore_check_view( $this->VncoreTemplatePath . '.notfound');
        return view(
            $this->VncoreTemplatePath . '.notfound',
            [
                'title' => vncore_language_render('front.data_not_found_title'),
                'msg' => vncore_language_render('front.data_not_found'),
                'description' => '',
                'keyword' => '',
            ]
        );
    }

}
