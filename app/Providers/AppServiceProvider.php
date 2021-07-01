<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Product::class => \App\Policies\ProductPolicy::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\ProductRepositoryInterface',
            'App\Repositories\Eloquents\ProductRepository',
            //'App\Repositories\Eloquents\SanPhamRepository',
        );

        $this->app->bind(
            'App\Repositories\UserRepositoryInterface',
            'App\Repositories\UserRepository',
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $menus = [
        //     'Trang Chủ',
        //     'Giới Thiệu',
        //     'Sản Phẩm',
        //     'Liên Hệ',
        // ];

        // View::share('menus',$menus);

        view()->composer(
            ['website.home.index','website.nguoidung.login', 'layout.includes.menu']
            ,'App\Http\ViewComposer\MenuComposer');

        
    }
}
