<?php
namespace Vncore\Front\Controllers;

use Vncore\Front\Controllers\RootFrontController;
use Vncore\Front\Models\FrontPage;

class HomeController extends RootFrontController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return 'Hello World';
    }

        /**
     * Process front form page detail
     *
     * @param [type] ...$params
     * @return void
     */
    public function pageDetailProcessFront(...$params)
    {
        if (config('app.seoLang')) {
            $lang = $params[0] ?? '';
            $alias = $params[1] ?? '';
            vncore_lang_switch($lang);
        } else {
            $alias = $params[0] ?? '';
        }
        return $this->_pageDetail($alias);
    }

    
    /**
     * Render page
     * @param  [string] $alias
     */
    private function _pageDetail($alias)
    {
        $page = (new FrontPage)->getDetail($alias, $type = 'alias');
        if ($page) {
            vncore_check_view($this->templatePath . '.screen.front_page');
            return view(
                $this->templatePath . '.screen.front_page',
                array(
                    'title'       => $page->title,
                    'description' => $page->description,
                    'keyword'     => $page->keyword,
                    'page'        => $page,
                    'og_image'    => vncore_file($page->getImage()),
                    'layout_page' => 'shop_page',
                    'breadcrumbs' => [
                        ['url'    => '', 'title' => $page->title],
                    ],
                )
            );
        } else {
            return $this->pageNotFound();
        }
    }
}
