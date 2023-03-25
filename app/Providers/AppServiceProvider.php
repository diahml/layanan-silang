<?php

namespace App\Providers;


use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('member', function (User $user) {
            return $user->is_member;
        });
        Gate::define('school', function (User $user) {
            return $user->is_school;
        });
    }
}
