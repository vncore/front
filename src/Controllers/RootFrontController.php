<?php
namespace Vncore\Front\Controllers;

use App\Http\Controllers\Controller;

class RootFrontController extends Controller
{
    public $vncore_templatePathAdmin;
    public $vncore_templatePathFront;
    public $templatePath;
    public function __construct()
    {
        $this->templatePath = config('vncore-config.front.path_view').'::templates.' . vncore_store_info('template','default');
        $this->vncore_templatePathAdmin = config('vncore-config.admin.path_view').'::';
        $this->vncore_templatePathFront = config('vncore-config.front.path_view').'::';
    }
    /**
     * Default page not found
     *
     * @return  [type]  [return description]
     */
    public function pageNotFound()
    {
        vncore_check_view( $this->templatePath . '.notfound');
        return view(
            $this->templatePath . '.notfound',
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
        vncore_check_view( $this->templatePath . '.notfound');
        return view(
            $this->templatePath . '.notfound',
            [
                'title' => vncore_language_render('front.data_not_found_title'),
                'msg' => vncore_language_render('front.data_not_found'),
                'description' => '',
                'keyword' => '',
            ]
        );
    }

}
