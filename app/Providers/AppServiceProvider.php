<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('admin_menus_count',function(){
            return [
                'admin' => \App\Admin::count(),
                'user'  => \App\User::count(),
                'exp'   => \App\Experiance::count(),
                'gui'   => \App\Guidance::count(),
                'imp'   => \App\ImpactNetwork::count(),
                'apps'   => \App\Application::count(),
                'post'   => \App\Post::count(),
                'menu'   => \App\Extramenu::count(),

            ];
        });
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
