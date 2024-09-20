<?php

namespace Vncore\Front;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Vncore\Front\Middleware\CheckDomain;
use Vncore\Front\Commands\FrontInstall;
class FrontServiceProvider extends ServiceProvider
{

    protected function initial()
    {
        //Create directory
        try {
            if (!is_dir($directory = app_path('Vncore/Front/Api'))) {
                mkdir($directory, 0755, true);
            }
            if (!is_dir($directory = app_path('Vncore/Front/Admin'))) {
                mkdir($directory, 0755, true);
            }
        } catch (\Throwable $e) {
            $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
            echo $msg;
            exit;
        }

                
        //Load publish
        try {
            $this->registerPublishing();
        } catch (\Throwable $e) {
            $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
            echo $msg;
            exit;
        }

        try {
            $this->commands([
                FrontInstall::class,
            ]);
        } catch (\Throwable $e) {
            $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
            vncore_report($msg);
            echo $msg;
            exit;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->initial();

        if (VNCORE_ACTIVE == 1 && \Illuminate\Support\Facades\Storage::disk('local')->exists('vncore-installed.txt')) {

            //Load helper
            try {
                foreach (glob(__DIR__.'/Library/Helpers/*.php') as $filename) {
                    require_once $filename;
                }
            } catch (\Throwable $e) {
                $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
                vncore_report($msg);
                echo $msg;
                exit;
            }

            //Boot process Vncore
            try {
                $this->bootDefault();
            } catch (\Throwable $e) {
                $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
                vncore_report($msg);
                echo $msg;
                exit;
            }

            //Route
            try {
                if (file_exists($routes = __DIR__.'/routes.php')) {
                    $this->loadRoutesFrom($routes);
                }
            } catch (\Throwable $e) {
                $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
                vncore_report($msg);
                echo $msg;
                exit;
            }

            //Route Api
            try {
                if (config('vncore-config.env.VNCORE_API_MODE')) {
                    if (file_exists($routes = __DIR__.'/Api/routes.php')) {
                        $this->loadRoutesFrom($routes);
                    }
                }
            } catch (\Throwable $e) {
                $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
                vncore_report($msg);
                echo $msg;
                exit;
            }


            try {
                $this->registerRouteMiddleware();
            } catch (\Throwable $e) {
                $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
                vncore_report($msg);
                echo $msg;
                exit;
            }

            try {
                $this->validationExtend();
            } catch (\Throwable $e) {
                $msg = '#VNCORE-FRONT:: '.$e->getMessage().' - Line: '.$e->getLine().' - File: '.$e->getFile();
                vncore_report($msg);
                echo $msg;
                exit;
            }

            $this->eventRegister();

        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/config.php', 'vncore-config');
        if (file_exists(__DIR__.'/Library/Const.php')) {
            require_once(__DIR__.'/Library/Const.php');
        }
    }

    public function bootDefault()
    {

        //
    }

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'check.domain'     => CheckDomain::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected function middlewareGroups()
    {
        return [
            'front'        => config('vncore-config.front.middleware'),
        ];
    }

    /**
     * Register the route middleware.
     *
     * @return void
     */
    protected function registerRouteMiddleware()
    {
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }

        // register middleware group.
        foreach ($this->middlewareGroups() as $key => $middleware) {
            app('router')->middlewareGroup($key, array_values($middleware));
        }
    }

    /**
     * Validattion extend
     *
     * @return  [type]  [return description]
     */
    protected function validationExtend()
    {
        //
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if ($this->app->runningInConsole()) {
            //
        }
    }

    //Event register
    protected function eventRegister()
    {
        //
    }
}
