<?php
namespace Vncore\Front\Controllers\Admin;

use Vncore\Core\Admin\Controllers\RootAdminController;

class RootFrontAdminController extends RootAdminController
{
    public $templatePath;
    public $templateFile;
    public function __construct()
    {
        parent::__construct();
        $this->templatePath = 'templates.' . vncore_store_info('template');
    }
}
