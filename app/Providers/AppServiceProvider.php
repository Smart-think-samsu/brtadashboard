<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        view()->composer('backend.master.include.supper', function ($view) {
            $view->with([
                // 'rolePermission'       => RolePermission::where('role_id','1')->pluck('menu_name')->toArray(),
                'user'      => Auth::user(),
            ]);
        });
    }
}
