<?php
namespace Vncore\Front\Controllers\Admin;

use Vncore\Core\Admin\Controllers\RootAdminController;

class RootFrontAdminController extends RootAdminController
{
    public $vncore_templatePathFront;
    public $templatePath;
    public $templateFile;
    public function __construct()
    {
        parent::__construct();
        $this->templatePath = 'templates.' . vncore_store_info('template');
        $this->templateFile = 'templates.' . vncore_store_info('template');
        $this->vncore_templatePathFront = config('vncore-config.front.path_view').'::';
    }
}
