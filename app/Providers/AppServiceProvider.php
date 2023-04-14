<?php

namespace App\Providers;
use App\Models\Demo;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            Gate::define('add-user',function($user){
                return $user->hasRole('admin');
            });
            Gate::define('delete-user',function(User $user){
                return $user->hasRole('admin');
            });
    }
}
